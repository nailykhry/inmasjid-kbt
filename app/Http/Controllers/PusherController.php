<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PusherController extends Controller
{
    //nanti buat list chat aja
    public function index()
    {
        $user_id = Auth::id();
        $messages = Message::all();

        return view('chat', compact('messages', 'user_id'));
    }

    public function show(User $user)
    {
        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('chat', compact('user', 'messages'));
    }

    public function broadcast(Request $request)
    {
        $message = $request->input('message');
        $user_id = $request->input('user_id');
        broadcast(new PusherBroadcast($message, $user_id))->toOthers();
        return view('broadcast', ['message' => $request->get('message'), 'user_id' => $user_id]);
    }

    public function receive(Request $request)
    {
        $message = $request->input('message');
        $user_id = $request->input('user_id');
        return view('message', ['message' => $message, 'user_id' => $user_id]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return back();
    }

}
