<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;

class ViewCarsController extends Controller
{
    public function index()
    {
        $data = Cars::all()->where('status', '=', 'Available');
        return view('customer.index', compact('data'));
    }

    public function search(Request $request)
    {
        try {
            $data = Cars::where('carModel', 'like', '%' . $request->search . '%')
                ->orwhere('merk', 'like', '%' . $request->search . '%')
                ->orwhere('nopol', 'like', '%' . $request->search . '%')
                ->get();

            $search = $request->search;
            return view('customer.index', compact('data', 'search'));
        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    }
}
