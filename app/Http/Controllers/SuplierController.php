<?php

namespace App\Http\Controllers;

use App\suplier;
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
        return view('suplier.create');
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
