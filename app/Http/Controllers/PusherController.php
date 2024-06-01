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
    public function show(User $user)
    {
        $auth = Auth::id();
        $senderId = Message::where('receiver_id', Auth::id())
                    ->pluck('sender_id')
                    ->unique()
                    ->toArray();
        $receiverId = Message::where('sender_id', Auth::id())
                    ->pluck('receiver_id')
                    ->unique()
                    ->toArray();

        $userId = array_merge($senderId, $receiverId);
        $userId = array_unique($userId);
        $userId = array_diff($userId, [Auth::id()]);

        $users = User::whereIn('id', $userId)->get();

        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('chat', compact('users','user', 'messages'));
    }


    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required',
        ]);


        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        // return response()->json([
        //     'message' => $message,
        // ]);
        return back();
    }

}
