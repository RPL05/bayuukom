<?php

namespace App\Http\Controllers;

use App\Suplier;
use App\Permintaan;
use App\Barang;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $supliers = Suplier::all();

        return view('suplier.index', compact('supliers'));
    }
    public function create()
    {
        $totalrequest = Permintaan::all()->count();
        $data = [
            'barang'      => Barang::Count()->get(),
            'perm'        => Permintaan::all(),
        ];
        return view('suplier.create', $data, compact('totalrequest'));
    }
    public function store(Request $request)
    {
        $supliers = Suplier::create([
            'nama'             => $request->nama,
            'email'            => $request->email,
            'phone'            => $request->phone,
        ]);

        $supliers->save();

        return redirect()->back()->with(['success' => 'data suplier berhasil dibuat' ]);
    }
    public function cetakLaporan($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakPertanggal = Suplier::whereBetween('created_at',[$tglawal, $tglakhir])->latest()->get();
        return view('suplier.cetak', compact('cetakPertanggal'));
    }
}
