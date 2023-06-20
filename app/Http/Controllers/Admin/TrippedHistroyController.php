<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrippedHistroyController extends Controller
{
    public function index()
    {
        return view('admin.tripped-history.index');
    }

    public function add()
    {
        return view('admin.tripped-history.add');
    }
}
