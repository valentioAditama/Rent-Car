<?php

namespace App\Http\Controllers\api\customer;

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
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // validate data 
            $request->validate([
                'nopol' => 'required',
                'date_in' => 'required',
                'date_out' => 'required',
                'time_in' => 'required',
                'time_out' => 'required',
                'car_model' => 'required',
                'customer_nic' => 'required',
                'customer_name' => 'required',
                'contact' => 'required',
            ]);

            // store to database
            Booking::create($request->all());

            // store to database inquery
            Inquery::create([
                'nopol' => $request->nopol,
                'customer_name' => $request->customer_name,
                'contact' => $request->contact,
                'email' => $request->email,
                'status' => "Pending"
            ]);

            // update cars status
            $dataCars = Cars::find($request->car_id);
            $dataCars->update([
                'status' => 'Pending'
            ]);

            return response([
                'code' => '200', 
                'status' => 'Created', 
                'data' => $dataCars
            ], 200);
        } catch (\Throwable $error) {
            return response([
                'code' => '200', 
                'status' => 'Created', 
                'data' => $error->erros()
            ], 200);
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
