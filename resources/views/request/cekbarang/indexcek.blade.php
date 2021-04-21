@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5 class="font-weight-bold">Daftar Barang</h5>
            <table class="table table-striped mt-4">
                <thead>
                  <tr class="">
                    <th>Kode Barang</th>
                    <th>Nama Suplier</th>
                    <th>Nama Barang</th>
                    <th>Phone</th>
                    <th>Stock</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($cek as $barang)
                    <tr>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->suplier->nama }}</td>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->suplier->phone }}</td>
                        <td>{{ $barang->quantity }}</td>
                        <td>
                            <a href="{{ route('request.cekbarang.createcek', $barang->id) }}" class="btn btn-outline-info btn-sm">Buat Request</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">Data Belum Tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
