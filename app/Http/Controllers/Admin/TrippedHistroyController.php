<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\TrippedHistory;
use Illuminate\Http\Request;

class TrippedHistroyController extends Controller
{
    public function index()
    {
        $data = TrippedHistory::all();
        return view('admin.tripped-history.index', compact('data'));
    }

    public function search(Request $request)
    {
        $data = TrippedHistory::where('nopol', 'like', '%' . $request->search . '%')
            ->orwhere('date_in', 'like', '%' . $request->search . '%')
            ->orwhere('date_out', 'like', '%' . $request->search . '%')
            ->orwhere('time_in', 'like', '%' . $request->search . '%')
            ->orwhere('time_out', 'like', '%' . $request->search . '%')
            ->orwhere('car_model', 'like', '%' . $request->search . '%')
            ->orwhere('customer_nic', 'like', '%' . $request->search . '%')
            ->orwhere('customer_name', 'like', '%' . $request->search . '%')
            ->orwhere('contact', 'like', '%' . $request->search . '%')
            ->orwhere('agent', 'like', '%' . $request->search . '%')
            ->orwhere('total_amount', 'like', '%' . $request->search . '%')
            ->get();

        // return redirect back
        return view('admin.tripped-history.index', compact('data'));
    }

    public function add()
    {
        return view('admin.tripped-history.add');
    }

    public function update(Request $request, $id)
    {
        try {
            // get id data
            $dataTrippedHistory = TrippedHistory::find($id);

            // validate data and store data to database 
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
                'agent' => 'required',
                'total_amount' => 'required'
            ]);

            $dataTrippedHistory->update($request->all());

            // check data cars after tripped history and update to available
            $dataCar = Cars::where('nopol', '=', $dataTrippedHistory->nopol)->first();
            $dataCar->update([
                'status' => 'Available'
            ]);

            // return view redirect back
            return redirect()->back()->with(['success' => 'Data Berhasil Di Update']);
        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    }
}
