<?php

namespace App\Http\Controllers;

use App\Models\Coordinates;
use Illuminate\Http\Request;

class OldMapController extends Controller
{
    public function showMap(Request $request)
    {
        // Get the passed 'lokacja' parameter
        if ($request->input('lokacja')) {


            $lokacja = $request->input('lokacja');

            // Retrieve the record from the database using the provided ID
            $record = Coordinates::findOrFail($lokacja); // Assuming 'id' is the key
            return view('history-map-data', ['lokacja' => $record]);
        }
        // Pass the record to the view
        return view('history-map-data');
    }
}
