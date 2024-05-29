<?php

namespace App\Http\Controllers;

use App\Models\ItemImage;
use App\Models\LostFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class LostFoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = LostFound :: with('itemImages')-> get();
        dd($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.lost-found');
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
            // 'latitude' => 'required',
            // 'longitude' => 'required',
            'pic_name' => 'required|string|max:255',
            'pic_phone' => 'required|string|max:15',
            'item_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $lostFound = LostFound::create($request->only(['category', 'item_name', 'description', 'location', 'latitude', 'longitude', 'pic_name', 'pic_phone']));

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

        return redirect()->route('index')
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
        dd($item);
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
