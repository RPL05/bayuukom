<?php

namespace App\Http\Controllers;

use App\barang;
use App\Suplier;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $barangs = Barang::all();

        return view('barang.index', compact('barangs'));
    }
    public function create()
    {
        $supliers = Suplier::all();

        return view('barang.create', compact('supliers'));
    }
    public function store(Request $request)
    {
        $barangs = Barang::create([
            'nama'          => $request->nama,
            'suplier_id'    => $request->suplier_id,
            'harga'         => $request->harga,
            'quantity'      => $request->quantity,
        ]);

        $barangs->save();

        return redirect()->back()->with(['success' => 'data barang berhasil dibuat' ]);
    }
    public function edit($id)
    {
        $barangs = Barang::findOrFail($id);

        $supliers = Suplier::all();

        return view('barang.edit', compact('barangs','supliers'));
    }
    public function update(Request $request, $id)
    {
        $barangs = Barang::find($id);

        $barangs->update($request-> all());

        return redirect()->back()->with(['success' => 'data barang berhasil diedit' ]);
    }
    public function dashboard()
    {
        $barangs = Barang::all();
        $supliers = Suplier::all();

        return view('barang.dashboard', compact('barangs','supliers'));
    }
}
