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
        $permintaan  = Permintaan::all();
        $barang = Barang::all();
        $totalrequest = Permintaan::all()->count();
        $data = [
            'barang'      => Barang::Count()->get(),
        ];

       return view('request.index', $data, compact('permintaan','barang','totalrequest'));
    }

    public function accept()
    {
        $permintaan  = Permintaan::all();
        $barang = Barang::all();
        $totalrequest = Permintaan::all()->count();
        $data = [
            'barang'      => Barang::Count()->get(),
        ];
       return view('request.accept', $data, compact('permintaan','barang','totalrequest'));
    }
    public function riject()
    {
        $permintaan  = Permintaan::all();
        $barang = Barang::all();
        $totalrequest = Permintaan::all()->count();
        $data = [
            'barang'      => Barang::Count()->get(),
        ];
       return view('request.riject', $data, compact('permintaan','barang','totalrequest'));
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);

        $permintaan = Permintaan::findOrFail($id);

        return view('request.show', compact('barang','permintaan'));
    }

    public function detail($id)
    {
        $barang = Barang::all();
        $permintaan = Permintaan::findOrFail($id);

        return view('request.riject.detail', compact('barang','permintaan'));
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
            'text' => 'Terima Kasih Telah Mengirim Permintaan Kepada Kami, Silahkan Menunggu Balasan Dari Kami Ya.'
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
    public function acceptLaporan($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $barang  = Barang::all();
        $cetakPertanggal = Permintaan::with('suplier')->whereBetween('created_at',[$tglawal, $tglakhir])->latest()->get();
        return view('request.accept.cetak', compact('cetakPertanggal','barang'));
    }
    public function rijectLaporan($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $barang  = Barang::all();
        $cetakPertanggal = Permintaan::with('suplier')->whereBetween('created_at',[$tglawal, $tglakhir])->latest()->get();
        return view('request.riject.cetak', compact('cetakPertanggal','barang'));
    }
}
