<?php

namespace App\Http\Controllers;

use App\Repositories\LocationsRepository;
use Illuminate\Http\Request;

class LocationsController extends Controller
{

    private LocationsRepository $repLocations;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repLocations = new LocationsRepository();
    }

    public function index()
    {
        try {
            return response()->json($this->repLocations->all(), 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'category' => 'required|string|max:15',
            'lat' => 'required|numeric|max:90.0000000|min:-90.0000000',
            'lng' => 'required|numeric|max:180.0000000|min:-180.0000000',
        ]);

        $result = $this->repLocations->cadastro($request);
        if (isset($result['error']))
            return response()->json($result, 500);

        return response()->json($result, 201);
    }
}
