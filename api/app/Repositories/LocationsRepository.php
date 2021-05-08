<?php

namespace App\Repositories;

use App\Models\Locations;
use Illuminate\Http\Request;

class LocationsRepository
{
    private Locations $locations;

    public function __construct()
    {
        $this->locations = new Locations();
    }

    public function all() {
        return $this->locations->all();
    }

    public function cadastro(Request $request)
    {
        try {
            $result = $this->locations->create($request->all());
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage()];
        }

        return $result;
    }
}
