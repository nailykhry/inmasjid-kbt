@extends('layout.main')

@section('title', 'Chat with ' . $user->username)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4" style="{{ $user->id === Auth::id() ? 'width: 100%;' : '' }}">
            <div class="card">
                <div class="card-header">Chat</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($users as $chatUser)
                        <li class="list-group-item py-3">
                            <a class="text-decoration-none" style="color: black; font-weight: bold;"
                                href="{{ route('chat.show', $chatUser->id) }}">{{ $chatUser->username }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8" style="{{ $user->id === Auth::id() ? 'display: none;' : '' }}">
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

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true,
        authEndpoint: '/broadcasting/auth',

        auth: {
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
        },
    });

    var channel = pusher.subscribe('private-chat.' + {{ $user->id }});

    channel.bind('App\\Events\\MessageSent', function(data) {
        var message = data.message;

        var chatBox = document.getElementById('chat-box');
        var newMessage = document.createElement('div');
        newMessage.classList.add('message');

        if (message.sender_id === {{ Auth::id() }}) {
            newMessage.innerHTML = `<p style="text-align: right;"><strong>You:</strong> ${message.message}</p>`;
        } else {
            newMessage.innerHTML = `<p><strong>{{ $user->username }}:</strong> ${message.message}</p>`;
        }

        chatBox.appendChild(newMessage);
        chatBox.scrollTop = chatBox.scrollHeight;
    });
</script>

@endsection