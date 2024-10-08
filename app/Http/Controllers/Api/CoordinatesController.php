<?php

namespace App\Http\Controllers\Api;

use App\Models\Coordinates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoordinatesRequest;
use App\Models\Vehicles;

class CoordinatesController extends Controller
{
    public function store(StoreCoordinatesRequest $request)
    {
        $coordinates = $request->validated();
        $vehicle = Vehicles::where('simID', $request->input('simID'))->where('Status', true)->first();
        if ($vehicle) {
            // Create a new Coordinates entry using validated data
            Coordinates::create($coordinates);
            return response()->json(['message' => 'Inserted'], 201);
        }
        // Return the created coordinates as a JSON response with a 201 status code
        return response()->json(['message' => 'Register sim id'], 404);
    }
}
