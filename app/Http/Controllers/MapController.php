<?php

namespace App\Http\Controllers;

use App\Models\LostFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MapController extends Controller
{
    public function index(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        if ($latitude && $longitude) {
            // Haversine formula to calculate distance
            $items = LostFound::select(DB::raw("*,
                             (6371 * acos(cos(radians($latitude))
                             * cos(radians(latitude))
                             * cos(radians(longitude) - radians($longitude))
                             + sin(radians($latitude))
                             * sin(radians(latitude)))) AS distance"))
                             ->having('distance', '<', 50) // 50 km radius
                             ->orderBy('distance')
                             ->get();
        } else {
            $items = LostFound::all();
        }

        return view('maps', [
            'items' => $items
        ]);
    }
}
