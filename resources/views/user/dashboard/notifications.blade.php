@extends('user.dashboard.layouts.admin')


@section('title', 'Notifications')


@push('style')

@endpush

@section('content')

    <div>
        @foreach ($notifications as $notification)
        <div class="card my-2">
            <div class="card-body">
                <h4>{{$notification->data['title']}}</h4>
                <p>{{$notification->data['body']}}</p>
                <p>{{$notification->created_at->longAbsoluteDiffForHumans()}}</p>
            </div>
        </div>
        @endforeach
    </div>

@endsection


@push('script')


@endpush
