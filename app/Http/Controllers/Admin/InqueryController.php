<?php

namespace App\Http\Controllers\Admin;

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
        $data = Inquery::all();
        return view('admin.inquery.index', compact('data'));
    }

    public function search(Request $request)
    {
        $data = Inquery::where('nopol', 'like', '%' . $request->search . '%')
            ->orwhere('customer_name', 'like', '%' . $request->search . '%')
            ->orwhere('contact', 'like', '%' . $request->search . '%')
            ->orwhere('email', 'like', '%' . $request->search . '%')
            ->orwhere('status', 'like', '%' . $request->search . '%')
            ->get();

        return view('admin.inquery.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {

            // get data id 
            $data = Inquery::find($id);
            $data->update($request->all());

            if ($request->status == "Booked") {
                // update status cars
                $dataCars = Cars::where('nopol', '=', $data->nopol)->first();
                $dataCars->update([
                    'status' => "Booked"
                ]);

                $dataCarBooking = Booking::where('nopol', '=', $data->nopol)->first();

                // find data tripped history
                $dataTrippedHistory = TrippedHistory::where('nopol', '=', $data->nopol)->first();

                // check data tripped history 
                if ($dataTrippedHistory == null) {
                    // store data to tripped history
                    TrippedHistory::create([
                        'nopol' => $dataCarBooking->nopol,
                        'date_in' => $dataCarBooking->date_in,
                        'date_out' => $dataCarBooking->date_out,
                        'time_in' => $dataCarBooking->time_in,
                        'time_out' => $dataCarBooking->time_out,
                        'car_model' => $dataCarBooking->car_model,
                        'customer_nic' => $dataCarBooking->customer_nic,
                        'customer_name' => $dataCarBooking->customer_name,
                        'contact' => $dataCarBooking->contact
                    ]);
                } else {
                    return redirect()->back();
                }
            } else {
                // update status cars
                $dataCars = Cars::where('nopol', '=', $data->nopol)->first();
                $dataCars->update([
                    'status' => "Available"
                ]);
            }

            return redirect()->back()->with(['success' => 'Status Berhasil Di Update']);
        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    }
}
