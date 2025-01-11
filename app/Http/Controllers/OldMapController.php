<?php

namespace App\Http\Controllers;

use App\Models\Coordinates;
use Illuminate\Http\Request;

class OldMapController extends Controller
{
    public function showMap(Request $request)
    {
        if ($request->input('lokacja')) {
            $lokacja = $request->input('lokacja');
            $record = Coordinates::findOrFail($lokacja);
            return view('history-map-data', ['lokacja' => $record]);
        }
        return view('history-map-data');
    }
}
