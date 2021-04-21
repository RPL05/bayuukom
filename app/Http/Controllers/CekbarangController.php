<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Suplier;
use Illuminate\Http\Request;

class CekbarangController extends Controller
{
    public function index()
    {
        $cek = Barang::with('suplier')->get();

        return view('request.cekbarang.indexcek', compact('cek'));
    }
    public function create($id)
    {
        $barangs = Barang::find($id);

        return view('request.cekbarang.createcek', compact('barangs'));
    }
}
