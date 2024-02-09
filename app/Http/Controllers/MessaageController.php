<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Models\Conversation;
use App\Models\Recipient;
use App\Models\Tallker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Throwable;

class MessaageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $tallker = Auth::user();
        $conversation = $tallker->conversations()->findOrFail($id);


        return $conversation->messages()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => ['required', 'string'],
            'conversation_id' => [
                Rule::requiredIf(function() use ($request) {
                    return ! $request->input('tallker_id');
                }),
                'int',
                'exists:conversations,id',
            ],
            'tallker_id' => [
                Rule::requiredIf(function() use ($request) {
                    return ! $request->input('conversation_id');
                }),
                'int',
                'exists:tallkers,id',
            ],
        ]);

        $tallker = Tallker ::find(1);//Auth::user();

        $conversation_id = $request->post('conversation_id');
        $tallker_id = $request->post('tallker_id');




        DB::beginTransaction();

        try{

            if ($conversation_id) {
                $conversation = $tallker->conversations()->findOrFail($conversation_id);
            }else{
                $conversation = Conversation::where('type', '=', 'peer')
                            ->whereHas('participants', function($builder) use ($tallker_id, $tallker){
                                $builder->join('participants as participants2', 'participants2.conversation_id', '=', 'participants.conversation_id')
                                        ->where('participants.tallker_id', '=', $tallker_id)
                                        ->where('participants2.tallker_id', '=', $tallker->id);
                            })->first();

                if (!$conversation) {
                    $conversation = Conversation::create([
                        'tallker_id' => $tallker->id,
                        'type' => 'peer',
                    ]);

                    $conversation->participants()->attach([
                        $tallker->id => ['joined_at' => now()],
                        $tallker_id => ['joined_at' => now()],
                    ]);
                }
            }

            $message = $conversation->messages()->create([
                'tallker_id' => $tallker->id,
                'body' => $request->post('message'),
            ]);

            DB::statement('
                    INSERT INTO recipients(tallker_id,message_id)
                    SELECT tallker_id, ? FROM participants
                    WHERE conversation_id = ?
            ', [$message->id, $conversation->id]);

            $conversation->update([
                'last_message_id' => $message->id,
            ]);

            DB::commit();

            broadcast(new MessageCreated($message));

        }catch(Throwable $e){
            DB::rollBack();
            throw $e;
        }

        return $message;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Recipient::where([
            'tallker_id' => Auth::id(),
            'message_id' => $id,
        ]);

        return [
            'message' => 'deleted',
        ];
    }
}
