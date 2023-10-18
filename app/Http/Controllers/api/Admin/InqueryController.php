<?php

namespace App\Http\Controllers\api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cars;
use App\Models\Inquery;
use App\Models\TrippedHistory;
use Illuminate\Http\Request;

class InqueryController extends Controller
{
    public function index()
    {
        $data = Inquery::all()->paginate(10);
        return response([
            'code' => '200', 
            'status' => 'OK', 
            'data' => $data 
        ], 200);
    }

    public function search(Request $request)
    {
        $data = Inquery::where('nopol', 'like', '%' . $request->search . '%')
            ->orwhere('customer_name', 'like', '%' . $request->search . '%')
            ->orwhere('contact', 'like', '%' . $request->search . '%')
            ->orwhere('email', 'like', '%' . $request->search . '%')
            ->orwhere('status', 'like', '%' . $request->search . '%')
            ->paginate(10);

            return response([
                'code' => '200', 
                'status' => 'OK', 
                'data' => $data 
            ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            // get data id 
            $data = Inquery::find($id);
            $data->update($request->all());

            // status if booked
            if ($request->status == "Booked") {
                // update status cars
                $dataCars = Cars::where('nopol', '=', $data->nopol)->first();
                $dataCars->update([
                    'status' => "Booked"
                ]);

                $dataCarBooking = Booking::where('nopol', '=', $data->nopol)->first();

                // store data to tripped history
                $createTrippedHistory = TrippedHistory::create([
                    'nopol' => $dataCarBooking->nopol,
                    'date_in' => $dataCarBooking->date_in,
                    'date_out' => $dataCarBooking->date_out,
                    'time_in' => $dataCarBooking->time_in,
                    'time_out' => $dataCarBooking->time_out,
                    'car_model' => $dataCarBooking->car_model,
                    'customer_nic' => $dataCarBooking->customer_nic,
                    'customer_name' => $request->customer_name,
                    'contact' => $dataCarBooking->contact
                ]);

                return response([
                    'code' => 201, 
                    'staus' => 'Created', 
                    'data' => $createTrippedHistory
                ], 201);

            } else {
                // update status cars
                $dataCars = Cars::where('nopol', '=', $data->nopol)->first();
                $dataCarsUpdate = $dataCars->update([
                    'status' => "Available"
                ]);

                return response([
                    'code' => 200, 
                    'status' => 'OK', 
                    'data' => $dataCarsUpdate
                ], 200);
            }

            return redirect()->back()->with(['success' => 'Status Berhasil Di Update']);
        } catch (\Throwable $error) {
            return response([
                'code' => '400', 
                'status' => 'Bad Request', 
                'message' => $error->errors() 
            ], 400);
        }
    }
}
