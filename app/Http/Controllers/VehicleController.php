<?php

namespace BookStack\Http\Controllers;

use Bookstack\Http\Requests\VehicleRequest;
use BookStack\Http\Controller;
use BookStack\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vehicles.index');
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(VehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->validated());
        return redirect()->route('vehicles.index');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validated());
        return redirect()->route('vehicles.index');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index');
    }
}
