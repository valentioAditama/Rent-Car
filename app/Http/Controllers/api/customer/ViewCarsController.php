<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;

class ViewCarsController extends Controller
{public function index()
    {
        $data = Cars::all()->where('status', '=', 'Available')->paginate(15);
        return response([
            'code' => '200', 
            'status' => "OK", 
            'data' => $data
        ], 200);
    }

    public function search(Request $request)
    {
        try {
            $data = Cars::where('carModel', 'like', '%' . $request->search . '%')
                ->orwhere('merk', 'like', '%' . $request->search . '%')
                ->orwhere('nopol', 'like', '%' . $request->search . '%')
                ->get();
                
                return response([
                    'code' => '200', 
                    'status' => "OK", 
                    'data' => $data
                ], 200);        
        } catch (\Throwable $error) {
            return response([
                'code' => '400', 
                'status' => "Bad Request", 
                'data' => $error->errors()
            ], 400);    
        }
    }
}
