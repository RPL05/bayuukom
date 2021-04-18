<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Masterbiaya;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $transaksis = Transaksi::all();

        $masterbiayas = Masterbiaya::all();

        return view('transaksi.index', compact('transaksis','masterbiayas'));
    }
    public function note($id)
    {
        $nota = Transaksi::with('masterbiaya')->findOrFail($id);

        return view('transaksi.rekap',compact('nota'));
    }
    public function create()
    {
        $transaksis = Transaksi::all();

        $masterbiayas = Masterbiaya::all();

        return view('transaksi.create', compact('transaksis','masterbiayas'));
    }
    public function store(Request $request)
    {
        $transaksis = Transaksi::create([
            'nama'          => $request->nama,
            'masterbiaya_id'=> $request->masterbiaya_id,
            'bayar'         => $request->bayar,
            'total_bayar'   => $request->total_bayar,
        ]);

        $transaksis->save();

        return redirect()->back()->with(['success' => 'data master biaya jasa berhasil dibuat' ]);
    }
    public function edit($id)
    {
        $transaksis = Transaksi::findOrFail($id);

        $masterbiayas = Masterbiaya::all();

        return view("transaksi.edit", compact('transaksis','masterbiayas'));
    }
    public function update(Request $request, $id)
    {
        $transaksis = Transaksi::find($id);

        $transaksis->update($request-> all());

        return redirect()->back()->with(['success' => 'data master biaya jasa berhasil diedit' ]);
    }
    public function destroy($id)
    {
        $transaksis = Transaksi::find($id);

        $transaksis -> delete($transaksis->all());

        return redirect()->back();
    }
}
