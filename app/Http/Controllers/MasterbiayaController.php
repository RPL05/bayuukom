<?php

namespace App\Http\Controllers;

use App\Masterbiaya;
use Illuminate\Http\Request;

class MasterbiayaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $masterbiayas = Masterbiaya::all();

        return view('masterbiaya.index', compact('masterbiayas'));
    }
    public function create()
    {
        return view('masterbiaya.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kendaraan'  => 'required',
            'biaya'           => 'required',
        ]);
        $masterbiayas = Masterbiaya::create([
            'nama_kendaraan'    => $request->nama_kendaraan,
            'biaya'             => $request->biaya,
        ]);

        $masterbiayas->save();

        return redirect()->back()->with(['success' => 'data master biaya jasa berhasil dibuat' ]);
    }
    public function edit($id)
    {
        $masterbiayas = Masterbiaya::findOrFail($id);

        return view("masterbiaya.edit", compact('masterbiayas'));
    }
    public function update(Request $request, $id)
    {
        $masterbiayas = Masterbiaya::find($id);

        $masterbiayas->update($request-> all());

        return redirect()->back()->with(['success' => 'data master biaya jasa berhasil diedit' ]);
    }
    public function destroy($id)
    {
        $masterbiayas = Masterbiaya::find($id);

        $masterbiayas -> delete($masterbiayas->all());

        return redirect()->back();
    }
}
