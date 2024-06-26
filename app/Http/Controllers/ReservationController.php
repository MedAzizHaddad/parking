<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Parking;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('parking')->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $parkings = Parking::all();
        return view('reservations.create', compact('parkings'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'heures' => 'required|integer|min:1',
            'montant' => 'required|numeric|min:0',
            'parking_id' => 'required|exists:parkings,id',
        ]);

        Reservation::create($validatedData);

        return redirect()->route('reservations.index')->with('success', 'Réservation créée avec succès.');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $parkings = Parking::all();
        return view('reservations.edit', compact('reservation', 'parkings'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'heures' => 'required|integer|min:1',
            'montant' => 'required|numeric|min:0',
            'parking_id' => 'required|exists:parkings,id',
        ]);

        $reservation->update($validatedData);

        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée avec succès.');
    }
}
