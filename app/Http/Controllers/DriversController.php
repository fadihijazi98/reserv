<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        $validated = $this->driverValidate($request);

        if ($request->has('img')) {

            $img = $request->img->store('public/drivers_images');
            $validated['img'] = preg_replace('/public/', '/storage', $img);

        }

        Driver::create($validated);

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
        //empty until ..
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return back();
    }

    private function getConditions($withImage = false)
    {
        $conditions = ['name' => 'required', 'phone' => 'required', 'city' => 'required',
            'vehicle_capacity' => 'required|int'];

        if ($withImage) {

            $conditions['img'] = 'required|image';

        }

        return $conditions;
    }

    private function driverValidate(Request $request)
    {

        return $request->validate($this->getConditions($request->has('img')));

    }
}
