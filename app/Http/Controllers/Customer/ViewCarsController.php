<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewCarsController extends Controller
{
    public function index() {
        return view('admin.show-cars');
    }
}