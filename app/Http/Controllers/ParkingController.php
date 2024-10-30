<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ParkingController extends Controller
{
    public function index()
    {
        $parkings = Parking::all();
        return view('admin.parkings', compact('parkings'));
    }

    public function create()
    {
        return view('admin.addParking');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'details' => 'required',
            'capacite' => 'required|integer|min:1',
        ]);

        Parking::create($validatedData);

        return redirect()->route('parkings.index')->with('success', 'Parking créé avec succès.');
    }

    public function show(Parking $parking)
    {
        return view('admin.showparking', compact('parking'));
    }

    public function edit(Parking $parking)
    {
        return view('admin.editparking', compact('parking'));
    }

    public function update(Request $request, Parking $parking)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'details' => 'required',
            'capacite' => 'required|integer|min:1',
        ]);

        $parking->update($validatedData);

        return redirect()->route('parkings.index')->with('success', 'Parking mis à jour avec succès.');
    }

    public function destroy(Parking $parking)
    {
        $parking->delete();
        return redirect()->route('parkings.index')->with('success', 'Parking supprimé avec succès.');
    }
}
