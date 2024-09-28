<?php

namespace App\Http\Controllers\Api;

use App\Models\Coordinates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoordinatesRequest;

class CoordinatesController extends Controller
{
    public function store(StoreCoordinatesRequest $request)
    {
        // Create a new Coordinates entry using validated data
        $coordinates = Coordinates::create($request->validated());

        // Return the created coordinates as a JSON response with a 201 status code
        return response()->json(['message' => 'Inserted'], 201);
    }
}
