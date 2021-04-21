<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Suplier;
use App\Permintaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NotifBarang;
use Nexmo\Laravel\Facade\Nexmo;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'barang'      => Barang::all(),
            'suplier'     => Suplier::Count()->get(),
        ];
       return view('request.index', $data);
    }

    public function accept()
    {
        $data = [
            'barang'      => Barang::all(),
            'suplier'     => Suplier::Count()->get(),
        ];
       return view('request.accept', $data);
    }
    public function riject()
    {
        $data = [
            'barang'      => Barang::all(),
            'suplier'     => Suplier::Count()->get(),
        ];
       return view('request.riject', $data);
    }

    public function store(Request $request, $id)
    {
        $requests = Permintaan::create([
            'nama'             => $request->nama,
            'alamat'           => $request->alamat,
            'jmlh_permintaan'  => $request->jmlh_permintaan,
            'email'            => $request->email,
            'no_telp'          => $request->no_telp,
            'barang_id'        => $request->barang_id,
        ]);

        Nexmo::message()->send([
            'to'   => $request->no_telp,
            'from' => 'BAYU',
            'text' => 'heloo ges'
        ]);


        \Mail::to($requests->email)->send(new NotifBarang);

        $requests->save();

        $req = Barang::findOrFail($id);
        $hitung = $req->quantity - $request->jmlh_permintaan;
        $req->update([
            'quantity' => $hitung,
        ]);

        return redirect()->back()->with(['success' => 'Permintaan berhasil dikirim' ]);
    }
}
