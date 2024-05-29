<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $user = User::find(Auth::id());
        $title = "Admin Dashboard";

        return view('admin.index', compact('user', 'title'));
    }
    public function inventories() {
        $user = User::find(Auth::id());
        $inventories = Inventory::orderBy('created_at', 'desc')->get();
        $title = "Inventories";

        return view('admin.inventoryList', compact('user', 'inventories', 'title'));
    }

    public function change_session($user_id, Request $request){
        $user = User::find($user_id);
        if ($user) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::login($user);
            return redirect('/profile');
        }
        return redirect()->back();
    }

    public function exit_session(){
        session()->forget('current_session');
        return redirect()->back();
    }
}
