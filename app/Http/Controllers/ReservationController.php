<?php

namespace App\Http\Controllers;

use App\Helpers\ReservationHelper;
use App\Models\Parking;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function userIndex()
    {
        $reservations = auth()->user()->reservations()
            ->with('parking')
            ->orderBy('date', 'desc')
            ->get();
        return view('reservations.user-index', compact('reservations'));
    }

    public function adminIndex()
    {
        $reservations = Reservation::with('parking', 'user')
            ->orderBy('date', 'desc')
            ->get();
        return view('reservations.admin-index', compact('reservations'));
    }

    public function create()
    {
        $parkings = Parking::all();
        return view('reservations.create', compact('parkings'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date|after:now',
            'heures' => 'required|integer|min:1',
            'montant' => 'required|numeric|min:0', // Add this line
            'parking_id' => 'required|exists:parkings,id',
        ]);

        // Add the user_id and statut to the validated data
        $validatedData['user_id'] = auth()->id();
        $validatedData['statut'] = 'en_attente';

        Reservation::create($validatedData);

        return redirect()->route('reservations.user')->with('success', 'Réservation créée avec succès.');
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

    public function approve(Reservation $reservation)
    {
//        $this->authorize('update', $reservation);
        $reservation->update(['statut' => 'approuvée']);
        return redirect()->back()->with('success', 'Réservation approuvée.');
    }

    public function decline(Reservation $reservation)
    {
        $reservation->update(['statut' => 'refusée']);
        return redirect()->back()->with('success', 'Réservation refusée.');
    }

    public function cancel(Reservation $reservation)
    {
        if (auth()->id() !== $reservation->user_id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à annuler cette réservation.');
        }

        if ($reservation->statut !== Reservation::STATUS_EN_ATTENTE) {
            return redirect()->back()->with('error', 'Vous ne pouvez annuler que les réservations en attente.');
        }

        $reservation->update(['statut' => Reservation::STATUS_ANNULEE]);
        return redirect()->back()->with('success', 'Réservation annulée avec succès.');
    }

}
