@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow">
            <div class="card-body">
                <h5 class="text-muted ml-2">Data Request Riject</h5>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Kode Request</th>
                            <th>Kode Barang</th>
                            <th>quantity</th>
                            <th>Jumlah Permintaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><h6>{{$permintaan->kode_request}}</h6></td>
                            @foreach ($barang as $barangs)
                                <td><h6>{{$barangs->kode_barang}}</h6></td>
                                <td><h6>{{$barangs->quantity}}</h6></td>
                            @endforeach
                            <td><h6>{{$permintaan->jmlh_permintaan}}</h6></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
