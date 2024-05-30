<!-- resources/views/chat/show.blade.php -->

@extends('layout.main')

@section('title', 'Home')

@section('content')
<div class="container">
    <h3>Chat with {{ $user->username }}</h3>
    <div class="card">
        <div class="card-body" id="chat-box" style="height: 300px; overflow-y: scroll;">
            @foreach ($messages as $message)
            <div class="message">
                @if ($message->sender_id === Auth::id())
                <p style="text-align: right;">
                    <strong>You:</strong> {{ $message->message }}
                </p>
                @else
                <p>
                    <strong>{{ $user->name }}:</strong> {{ $message->message }}
                </p>
                @endif
            </div>
            @endforeach
        </div>
        <div class="card-footer">
            <form action="{{ route('chat.send') }}" method="post">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Type your message here...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection