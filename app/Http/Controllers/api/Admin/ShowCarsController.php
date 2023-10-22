<?php

namespace App\Http\Controllers\api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;

class ShowCarsController extends Controller
{
    public function index() {
        $data = Cars::all()->paginate(15);
        return response([
            'code' => 200, 
            'status' => 'OK', 
            'data' => $data
        ], 200);
    }
}
