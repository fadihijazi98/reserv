<?php

namespace App\Http\Controllers;

use App\Passenger;
use Illuminate\Http\Request;

class PassengersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->passengerValidate($request);

        $passenger = Passenger::where('name', $validated['name'])->where('phone', $validated['phone'])->where('address', $validated['address'])->first();

        if(!$passenger) {

            $passenger = Passenger::create($validated);

        }

        $passenger->trips()->attach($request['trip_id']);

        return back()->with('message', 'تم الحجز بنجاح');
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
    public function destroy(Passenger $passenger)
    {
        $passenger->delete();
        return  back();
    }

    private function getConditions()
    {
        return ['name' => 'required', 'phone' => 'required', 'address' => 'required', 'trip_id' => 'required|integer'];
    }

    private function passengerValidate(Request $request)
    {
        return $request->validate($this->getConditions());
    }
}
