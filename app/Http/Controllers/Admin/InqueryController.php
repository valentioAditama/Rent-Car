<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquery;
use Illuminate\Http\Request;

class InqueryController extends Controller
{
    public function index()
    {
        $data = Inquery::all();
        return view('admin.inquery.index', compact('data'));
    }
}
