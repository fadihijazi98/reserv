<?php

namespace App\Http\Controllers;

use App\Destination;
use App\Driver;
use App\Trip;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all();
        $destinations = Destination::all();
        $drivers = Driver::all();
        $trip_view = true;

        return view('trips.index', compact(['trips', 'destinations', 'drivers', 'trip_view']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->tripValidate($request);
        Trip::create($validated);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return back();
    }

    public function passengers($id) {

        $trip = Trip::find($id);

        if(!$trip)
            abort(404);

        $passengers = $trip->passengers()->get();

        return view('trips.passengers_details', compact('passengers'));

    }

    private function getConditions()
    {
        return ['date' => 'required|date', 'hour' => 'required|date_format:H:i',
            'id_driver' => 'required|integer', 'id_destination' => 'required|integer'];
    }

    private function tripValidate(Request $request)
    {
        return $request->validate($this->getConditions());
    }
}
