<?php

namespace App\Http\Controllers\Laporan;

use PDF;
use App\Masterbiaya;
use App\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporantransaksiController extends Controller
{
    public function rekaptransaksi()
    {
        $transaksis = Transaksi::with('masterbiaya')->get();

        $pdf = PDF::loadView('rekap.transaksi.rekap', compact('transaksis'))->setPaper('a4', 'landscape');

        return $pdf->stream('rekap_laporan_transaksi.pdf');
    }
}
