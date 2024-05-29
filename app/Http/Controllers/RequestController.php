<?php

namespace App\Http\Controllers;

use App\Models\Request as RequestModel;
use App\Models\RequestStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class RequestController extends Controller
{
    public function store(Request $request)
    {
        $request_barang = new RequestModel();
        $request_barang->requester_id = auth()->user()->id;
        $request_barang->nama_pengaju = $request->input('nama_pengaju');
        $request_barang->stok = $request->input('stok');
        $request_barang->lokasi = $request->input('alamat');
        $request_barang->inventory_id = $request->input('inventory_id');

        // try {
        $request_barang->save();

        if ($request_barang->save()) {
            $requestStatus = new RequestStatus();
            $requestStatus->request_id = $request_barang->id;
            $requestStatus->status = 'diajukan';
            $requestStatus->save();
        }

        return redirect()->url('my-requests')->with('success', 'Berhasil mengajukan barang');
        // } catch (\Exception $e) {
        //     return response()->json($e, 500);
        // }
    }

    public function index()
    {
        $user = Auth::user();
        $requests = RequestModel::with(['inventory', 'statuses'])->where('requester_id', $user->id)->get();
        $title = "My Requests";

        $selected_request = null;

        // dd($requests);
        return view('activity.out', compact('user', 'requests', 'title', 'selected_request'));
    }

    public function showAll()
    {
    }

    public function myrequest_info($id)
    {
        $user = Auth::user();
        $requests =  RequestModel::with(['inventory', 'statuses'])->find($id);
        $title = "My Requests";

        $selected_request = RequestModel::where('id', $id)->get()->first();

        return view('activity.out', compact('user', 'requests', 'title', 'selected_request'));
    }

    public function acceptRequest($request_id)
    {
        $user = Auth::user();
        $request = RequestModel::where('id', $request_id)->get();

        if (!$request) {
            abort(404);
        }

        $request->status = 'disetujui';
        $request->tanggal_persetujuan = now();

        $request->save();

        return redirect()->back()->with('success', 'sukses memperbarui data');
    }
}
