<?php

namespace App\Http\Controllers;

use App\Models\ItemImage;
use App\Models\LostFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LostFoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = LostFound :: with('itemImages')->latest()->get();
        return view('daftar-barang', [
            'title' => 'Item List',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.postItem', [
            'title' => 'Post Item'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'pic_name' => 'required|string|max:255',
            'pic_phone' => 'required|string|max:15',
            'item_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $userId = Auth::user()->id;
        // $lostFound = LostFound::create($request->only(['category', 'item_name', 'description', 'location', 'latitude', 'longitude', 'pic_name', 'pic_phone']));

        $lostFound = LostFound::create([
            'user_id' => $userId,
            'category' => $request->category,
            'item_name' => $request->item_name,
            'description' => $request->description,
            'location' => $request->location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'pic_name' => $request->pic_name,
            'pic_phone' => $request->pic_phone,
        ]);

        if ($request->hasFile('item_images')) {
            foreach ($request->file('item_images') as $image) {
                $path = $image->store('item_images', 'public');

                // Create item image
                 ItemImage::create([
                    'lost_found_id' => $lostFound->id,
                    'image_path' => $path
                ]);
            }
        }else {
            Log::info('No files uploaded');
        }

        return redirect()->route('lost-founds.index')
            ->with('success', 'Lost n Found Post berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = LostFound::with('itemImages')->findOrFail($id);
        return view('items.itemDetail', [
            'title' => 'Detail Item',
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
