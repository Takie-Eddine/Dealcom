<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable = [
        'admin_id', 'name', 'description', 'status',
    ];
    public $translatable = ['name', 'description' ];
    protected $searchable = [

            'columns' => [
                'tasks.name' => 10,
            ],
        ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
