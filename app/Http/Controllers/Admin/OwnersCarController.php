<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class OwnersCarController extends Controller
{
    public function index()
    {
        // 
    }

    public function search(Request $request)
    {
        try {
            $data = Cars::where('carModel', 'like', '%' . $request->search . '%')
                ->orwhere('merk', 'like', '%' . $request->search . '%')
                ->orwhere('nopol', 'like', '%' . $request->search . '%')
                ->get();

            $valueSearch = $request->search;
            return view('admin.show-cars.search', compact('data', 'valueSearch'));
        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    }

    public function create()
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
                'detail' => 'required',
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
                'detail' => $request->detail,
                'status' => "Available"
            ]);

            // return redirect back 
            return redirect()->back()->with(['success' => 'Data Berhasil Di Tambahkan']);
        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    }

    public function edit(String $id)
    {
        // get data 
        $data = Cars::find($id);
        return view('admin.show-cars.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            // get data cars
            $data = Cars::find($id);

            $request->validate([
                'nopol' => 'required',
                'merk' => 'required',
                'carModel' => 'required',
                'kilometerAwal' => 'required',
                'warna' => 'required',
                'passenger' => 'required',
                'detail' => 'required'
            ]);

            if ($request->file('pitcure1') == null) {
            } else {
                $pitcure1 = $request->file('pitcure1')->store('public/owner-cars');
                $data->update([
                    'pitcure1' => substr($pitcure1, 18),
                ]);
            }

            if ($request->file('pitcure2') == null) {
            } else {
                $pitcure2 = $request->file('pitcure2')->store('public/owner-cars');
                $data->update([
                    'pitcure2' => substr($pitcure2, 18),
                ]);
            }

            if ($request->file('pitcure3') == null) {
            } else {
                $pitcure3 = $request->file('pitcure3')->store('public/owner-cars');
                $data->update([
                    'pitcure3' => substr($pitcure3, 18),
                ]);
            }

            $data->update([
                'nopol' => $request->nopol,
                'merk' => $request->merk,
                'carModel' => $request->carModel,
                'kilometerAwal' => $request->kilometerAwal,
                'warna' => $request->warna,
                'passenger' => $request->passenger,
                'detail' => $request->detail
            ]);

            // return redirect back 
            return redirect()->back()->with(['success' => 'Data Berhasil Di Tambahkan']);
        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            // get data id
            $data = Cars::find($id);
            $data->delete();

            return redirect()->back()->with(['success' => 'Data Berhasil Di Hapus']);
        } catch (\Throwable $error) {
            return $error->getMessage();
        }
    }
}
