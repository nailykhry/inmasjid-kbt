<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\InventoryImages;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class InventoryController extends Controller
{
    public function getAllInventories()
    {
        if (!Auth::id()) {
            $inventories = Inventory::orderBy('created_at', 'desc')->get();
        } else {
            $inventories = Inventory::where('status', '=', 'tersedia')->orderBy('created_at', 'desc')->get();
        }

        $showMore = true;

        return view('home', compact('inventories', 'showMore'));
    }

    public function index()
    {
        return view('home');
    }

    public function get8Inventories()
    {
        if (!Auth::id()) {
            $inventories = Inventory::orderBy('created_at', 'desc')->take(8)->get();
        } else {
            $inventories = Inventory::where('status', '=', 'tersedia')->orderBy('created_at', 'desc')->take(8)->get();
        }

        $showMore = false;


        return view('daftar_barang', compact('inventories', 'showMore'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $types = Type::all();

        if ($search) {
            $inventories = Inventory::where('nama', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $inventories = Inventory::orderBy('created_at', 'desc')->get();
        }

        return view('inventory.search', compact('inventories', 'types'));
    }

    public function getInventoryById($id)
    {
        $inventory = Inventory::join('users', 'inventories.pic_id', '=', 'users.id')
            ->where('inventories.id', $id)
            ->select('inventories.*', 'users.name as pic_name', 'users.phone as pic_phone')
            ->first();

        $inventoryImages = InventoryImages::where('inventory_id', $id)->get();

        if (!$inventory) {
            return abort(404); // Handle jika inventory dengan ID tertentu tidak ditemukan
        }

        $auth_user_id = Auth::id();

        if ($inventory->pic_id == $auth_user_id) {
            return view('inventory.ownerDetail', compact('inventory', 'inventoryImages'));
        } else {
            return view('inventory.requestDetail', compact('inventory', 'inventoryImages'));
        }
    }

    public function create()
    {
        // $type = Type::find($id);
        $type = ['Barang ditemukan', 'Barang hilang'];
        $title = "Post Barang";

        $pic_data = Auth::user()->role == 'admin' ? session('current_session') : Auth::user();

        return view('inventory.createAds', compact('type', 'title', 'pic_data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'lokasi' => 'required',
            'stok' => 'required|numeric',
            'nama_pic' => 'required',
            'telp_pic' => 'required|numeric',
        ]);
        $inventory = new Inventory();
        $inventory->nama = $request->input('nama');
        $inventory->nama_pic = $request->input('nama_pic');
        $inventory->telp_pic = $request->input('telp_pic');
        $inventory->type_id = $request->input('type_id');
        $inventory->stok = $request->input('stok');
        $inventory->deskripsi = $request->input('deskripsi');
        $inventory->lokasi = $request->input('lokasi');
        if (auth()->user()->role == 'admin') {
            $current_session = session()->get("current_session");
            $inventory->pic_id = $current_session->id;
        } else {
            $inventory->pic_id = Auth::id();
        }

        $inventory->save();

        $files = $request->file('imageFile');
        if ($request->has('imageFile')) {
            for ($i = 0; $i < count($files); $i++) {

                $fileName[$i] = $files[$i]->getClientOriginalName();
                $fileExt[$i] = $files[$i]->getClientOriginalExtension();
                $fileSave[$i] = $request->nama . '-' . time() . '-' . $i . '.' . $fileExt[$i];
                $files[$i]->move(public_path('images/inventories'),  $fileSave[$i]);

                $inventoryImages = new InventoryImages();
                $inventoryImages->inventory_id = $inventory->id;
                $inventoryImages->filename = $fileSave[$i];
                $inventoryImages->save();
            }
        } else {
            return redirect()->back()->with('error', 'Foto harus ada');
        }


        $inventory->foto = $fileSave[0];
        $inventory->save();

        return redirect('my-inventories')->with('success', 'Inventory berhasil ditambahkan');
    }

    public function edit($id)
    {
        $inventory = Inventory::with('images')->find($id);

        // dd($inventory->images);
        // dd($inventory->images);
        if (!$inventory) {
            return abort(404);
        }

        $title = "Edit Iklan";
        $type = Type::find($inventory->type_id);
        $pic_data = Auth::user()->role == 'admin' ? session('current_session') : Auth::user();

        return view('inventory.editAds', compact('inventory', 'type', 'pic_data', 'title'));
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $inventory = Inventory::with('images')->find($id);

        if (!$inventory) {
            return abort(404);
        }

        $this->validate($request, [
            'nama' => 'required',
            'lokasi' => 'required',
            'stok' => 'required|numeric',
            'nama_pic' => 'required',
            'telp_pic' => 'required|numeric',
        ]);
        $inventory->nama = $request->input('nama');
        $inventory->nama_pic = $request->input('nama_pic');
        $inventory->telp_pic = $request->input('telp_pic');
        $inventory->type_id = $request->input('type_id');
        $inventory->stok = $request->input('stok');
        $inventory->deskripsi = $request->input('deskripsi');
        $inventory->lokasi = $request->input('lokasi');
        if (auth()->user()->role == 'admin') {
            $current_session = session()->get("current_session");
            $inventory->pic_id = $current_session->id;
        } else {
            $inventory->pic_id = Auth::id();
        }


        $files = $request->file('imageFile');

        // dd(count($files));
        // dd($inventory->images[0]->filename);


        if ($request->has('imageFile')) {

            // Kondisi menghitung jumlah inventoriesImage
            for ($j = 0; $j < count($inventory->images); $j++) {

                // Menghapus inventories image jika ada
                if (File::exists('images/inventories/' . $inventory->images[$j]->filename)) {
                    File::delete('images/inventories/' . $inventory->images[$j]->filename);
                }
            }

            // Untuk menyimpan data yang di update
            for ($i = 0; $i < count($files); $i++) {


                $fileName[$i] = $files[$i]->getClientOriginalName();
                $fileExt[$i] = $files[$i]->getClientOriginalExtension();
                $fileSave[$i] = $request->nama . '-' . time() . '-' . $i . '.' . $fileExt[$i];
                $files[$i]->move(public_path('images/inventories'),  $fileSave[$i]);

                $inventoryImages = new InventoryImages();
                $inventoryImages->inventory_id = $inventory->id;
                $inventoryImages->filename = $fileSave[$i];
                $inventoryImages->save();
            }


            $inventory->foto = $fileSave[0];
        }

        $inventory->save();

        return redirect('my-inventories')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $inventory = Inventory::find($id);

        if (!$inventory) {
            return abort(404);
        }

        $path = 'storage/inventories/' . $inventory->foto;
        if (is_file($path)) {
            unlink($path);
        }

        $inventory->delete();

        return redirect()->back()->with('success', 'Barang berhasil dihapus');
    }
}
