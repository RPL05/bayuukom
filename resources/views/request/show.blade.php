@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow">
            <div class="card-body">
                <h5 class="text-muted ml-2">Data Pribadi</h5>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><h6>{{$permintaan->nama}}</h6></td>
                            <td><h6>{{$permintaan->alamat}}</h6></td>
                            <td><h6>{{$permintaan->email}}</h6></td>
                            <td><h6>{{$permintaan->no_telp}}</h6></td>
                        </tr>
                    </tbody>
                </table>
                <h5 class="text-muted ml-2 pt-2 mb-2">
                    Detail Permintaan
                </h5>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah Stock</th>
                            <th>Jumlah Permintaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td><h6>{{$barang->nama}}</h6></td>
                                <td><h6>{{$barang->quantity}}</h6></td>
                                <td><h6>{{$permintaan->jmlh_permintaan}}</h6></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
