<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use App\Exports\ExportInventory;
use App\Exports\ExportNeedAction;
use App\Models\Request as ModelsRequest;
use App\Models\RequestStatus;
use Maatwebsite\Excel\Facades\Excel;

class ProfileController extends Controller
{
    public function show()
    {

        $user = User::find(auth()->user()->id);
        $title = "Profile";

        return view('user.profile', compact('user', 'title'));
    }

    public function userInventories(){
        $user = User::find(auth()->user()->id);
        $title = "Barang/Iklan Saya";

        $inventories = Inventory::where('pic_id', '=', $user->id)->get();

        return view('user.inventories', compact('user', 'title', 'inventories'));
    }

    public function junkInventories(){
        $user = User::find(auth()->user()->id);
        $title = "Removed";

        $inventories = Inventory::where('pic_id', '=', $user->id)->where('status', '=', 'dihapus')->get();

        return view('user.junk', compact('user', 'title', 'inventories'));
    }

    public function lelangInventories(){
        $user = User::find(auth()->user()->id);
        $title = "Barang yang dilelang";

        $inventories = Inventory::where('pic_id', '=', $user->id)->where('status', '=', 'lelang')->get();

        return view('user.lelang', compact('user', 'title', 'inventories'));
    }

    public function completedInventories(){
        $user = User::find(auth()->user()->id);
        $title = "Barang yang sudah direlokasi";

        $inventories = Inventory::where('pic_id', '=', $user->id)->where('status', '=', 'relokasi')->get();

        return view('user.complete', compact('user', 'title', 'inventories'));
    }

    public function needActionInventories(){
        $user = User::find(Auth::user()->id);
        $title = "Barang yang Perlu Tindakan";

        $inventories = ModelsRequest::whereHas('inventory', function($q) use($user) {
            $q->where('pic_id', $user->id);
        })->get();
        // dd($inventories);
        return view('user.need-actions', compact('user', 'title', 'inventories'));
    }

    public function needActionInventoriesView($id){
        $need = ModelsRequest::with(['inventory','statuses'])->find($id);
        $rejectedStatusExists = $need->statuses->contains('status', 'ditolak');

        return view('user.need-actions-view', compact('need','rejectedStatusExists'));
    }

    public function needActionInventoriesDestroy($id){
        $need = ModelsRequest::find($id);
        $need->delete();
        return redirect()->back();
    }

    public function needActionInventoriesExcel(){
        $user = User::find(Auth::id());
        return Excel::download(new ExportNeedAction, now().'-'.$user->username.'`s-need-action-inventories-'.'.xlsx');
    }

    public function downloadExcel(Request $request){
        $user = User::find(auth()->user()->id);
        return Excel::download(new ExportInventory($request->status), now().'-'.$user->username.'`s-inventories-'.$request->status.'.xlsx');
    }

    public function changeStatusInventories(Request $request, $id){
        $inventories = Inventory::find($id);
        $inventories->status = $request->status;
        $inventories->save();
        return redirect('profile');
    }
}
