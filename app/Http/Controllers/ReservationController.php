<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation = Reservation::get();
        return view('reservation.index', compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required',
            'reservations' => 'required|max:255',
            'total_menu' => 'required|numeric',
            'total_price' => 'required|numeric',
            'table_number' => 'required|numeric',
        ]);
        Reservation::create($request->all());
        return redirect()->route('reservation.index')->with('success', 'enjoy your food');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('reservation.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'menu_id' => 'required',
            'reservations' => 'required|max:255',
            'total_menu' => 'required|numeric',
            'total_price' => 'required|numeric',
            'table_number' => 'required|numeric',
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservation.index')->with('success', 'enjoy it!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservation.index')->with('success', 'oh, it`s not what you want?');
    }
}
