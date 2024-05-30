<!-- resources/views/chat/show.blade.php -->

@extends('layout.main')

@section('title', 'Chat with ' . $user->username)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4" style="{{ $user->id === Auth::id() ? 'width: 100%;' : '' }}">
            <!-- Left column for chat list -->
            <div class="card">
                <div class="card-header">
                    Chat
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        {{-- Example of showing multiple users --}}
                        @foreach ($users as $chatUser)
                        <li class="list-group-item py-3">
                            <a class="text-decoration-none" style="color: black; font-weight: bold; "
                                href="{{ route('chat.show', $chatUser->id) }}">{{
                                $chatUser->username }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8" style="{{ $user->id === Auth::id() ? 'display: none;' : '' }}">
            <!-- Right column for chat -->
            <strong>{{ $user->username }}</strong>
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
                            <strong>{{ $user->username }}:</strong> {{ $message->message }}
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
                            <input type="text" name="message" class="form-control"
                                placeholder="Type your message here...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection