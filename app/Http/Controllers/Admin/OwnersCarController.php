<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;

class OwnersCarController extends Controller
{
    public function index()
    {
        return view('admin.show-cars.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nopol' => 'required',
                'merk' => 'required',
                'carModel' => 'required',
                'kilometerAwal' => 'required',
                'pitcure1' => 'required|mimes:jpg,png,jpeg',
                'pitcure2' => 'required|mimes:jpg,png,jpeg',
                'pitcure3' => 'required|mimes:jpg,png,jpeg',
                'warna' => 'required',
                'passenger' => 'required',
                'detail' => 'required'
            ]);

            $pitcure1 = $request->file('pitcure1')->store('public/owner-cars');
            $pitcure2 = $request->file('pitcure2')->store('public/owner-cars');
            $pitcure3 = $request->file('pitcure3')->store('public/owner-cars');

            Cars::create([
                'nopol' => $request->nopol,
                'merk' => $request->merk,
                'carModel' => $request->carModel,
                'kilometerAwal' => $request->kilometerAwal,
                'pitcure1' => substr($pitcure1, 18),
                'pitcure2' => substr($pitcure2, 18),
                'pitcure3' => substr($pitcure3, 18),
                'warna' => $request->warna,
                'passenger' => $request->passenger,
                'detail' => $request->detail
            ]);

            return "berhasil";

        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    }
}
