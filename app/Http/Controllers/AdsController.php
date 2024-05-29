<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    public function index()
    {   
        if(auth()->user()->role == 'admin'){
            if(session()->has('current_session')){
                $user = session('current_session');
            }
            else{
                return redirect()->back();
            }
        }

        $title = "Pasang Iklan Anda";
        return view('inventory.ads', compact('title'));
    }
    
    public function checkout($id){
        $user = User::find(Auth::id());
        $inventory = Inventory::join('users', 'inventories.pic_id', '=', 'users.id')
        ->where('inventories.id', $id)
        ->select('inventories.*', 'users.name as pic_name', 'users.phone as pic_phone')
        ->first();

        $title = "Checkout";

        return view('inventory.checkout', compact('inventory', 'user', 'title'));
    }
}
