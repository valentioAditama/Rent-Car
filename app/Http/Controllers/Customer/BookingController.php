<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cars;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // validate data 
            $validated = $request->validate([
                'nopol' => 'required',
                'date_in ' => 'required',
                'date_out' => 'required',
                'time_in' => 'required',
                'time_out' => 'required',
                'car_model' => 'required',
                'customer_nic' => 'required',
                'customer_name' => 'required',
                'contact' => 'required',
                'email' => 'required',
            ]);

            Booking::create($validated);


            return redirect()->back()->with(['success' => 'Mobil Berhasil Di Booking']);
        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
