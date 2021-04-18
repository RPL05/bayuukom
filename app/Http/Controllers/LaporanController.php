<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Masterbiaya;
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
        $masterbiayas = Masterbiaya::all();
        $cetakPertanggal = Transaksi::all()->whereBetween('created_at',[$tglawal, $tglakhir])->all();
        return view('laporan.cetak', compact('cetakPertanggal', 'masterbiayas'));
    }
}
