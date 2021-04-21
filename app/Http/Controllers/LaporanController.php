<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Suplier;
use App\Laporan;
use PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tampils = Transaksi::with('masterbiaya')->latest()->paginate(1);
        return view('laporan.index', compact('tampils'));
    }
    public function cetakLaporan($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $supliers = Suplier::all();
        $cetakPertanggal = Barang::whereBetween('created_at',[$tglawal, $tglakhir])->latest()->get();
        return view('barang.cetak', compact('cetakPertanggal', 'supliers'));
    }
}
