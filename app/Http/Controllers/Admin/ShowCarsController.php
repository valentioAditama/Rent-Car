<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;

class ShowCarsController extends Controller
{
    public function index()
    {
        $data = Cars::all();
        return view('admin.show-cars.index', compact('data'));
    }
}
