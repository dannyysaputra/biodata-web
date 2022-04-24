<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::all();
        return view('pages.dashboard', ['biodata' => $biodata]);
    }

    public function inputDashboard()
    {
        return view('pages.input-dashboard');
    }

    public function simpanBiodata(Request $request)
    {
        $biodata = [
            'id_user' => 1,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal,
            'alamat' => $request->alamat,
            'hobi' => $request->hobi,
        ];

        // dd($data);

        Biodata::create($biodata);
        return redirect('/')->with('message', 'Data berhasil disimpan!');
    }

    public function ubahBiodata($id)
    {
        $biodata = Biodata::select('*')
                    ->where('id', $id)
                    ->get();
        
        return view('pages.ubah-biodata', ['biodata' => $biodata]);
    }

    public function updateBiodata(Request $request) 
    {
        $biodata = Biodata::where('id', $request->id)
        ->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal,
            'alamat' => $request->alamat,
            'hobi' => $request->hobi,
        ]);

        return redirect('/')->with('message', 'Data berhasil diubah!');
    }

    public function hapusBiodata($id) 
    {
        $biodata = Biodata::where('id', $id)->delete();

        Biodata::deleted($biodata);
        return redirect('/')->with('message', 'Data berhasil dihapus!');
    }

    public function cariBiodata(Request $request)
    {
        $cari=$request->search;

        $data = User::join('biodata', 'biodata.id', '=', 'users.id')
        ->orWhere(function ($query) use($cari) {
            // $query->where('users.name', auth()->user()->name)
            $query->where('biodata.nama', 'like', "%".$cari."%");
        })
        ->orWhere(function ($query) use($cari) {
            $query->where('biodata.tanggal_lahir', date('Y-m-d', strtotime($cari)));
        })
        ->orWhere(function ($query) use($cari) {
            $query->where('biodata.alamat', 'like', "%".$cari."%");
        })
        ->orWhere(function ($query) use($cari) {
            $query->where('biodata.hobi', 'like', "%".$cari."%");
        })
        ->get(['users.nama', 'biodata.*']);

        if($data) {
            return view('pages.search', ['data'=>$data])->with('message', 'Data di temukan');
        } else {
            abort(404);
        }
    }
}