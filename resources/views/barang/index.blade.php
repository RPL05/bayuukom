@extends('layouts.app')

@section('content')
<div class="d-flex bd-cheatsheet container-fluid bg-body">
    <div class="col-md-2" style="margin-top : -28px">
        <section id="content">
            <h5 class="sticky-xl-top fw-bold pt-3 pt-xl-5 pb-2 pb-xl-3" style="margin-left : 60px">{{ auth()->user()->roles->first()->name }}</h5>
            <article>
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2 text-center">
                    <img src="{{asset('image/awww.png')}}" class="rounded-circle mt-3" width="80px" alt="">
                    <p class="font-weight-bold text-center pt-2">Steave Jobs</p>
                </div>
                <p class="text-muted text-center"style="margin-top: -15px">steavejobs@mail.com
                    <a href="{{ route('users.index') }}" class="btn btn-outline-primary btn-sm btn-block mt-3">Invite Member</a>
                </p>
                <div class="d-flex justify-content-center" style="margin-top: 15px">
                <div class="px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                </div>
                    <p class="font-weight-bold text-center px-2" style="margin-top: 3px">+62 XXXXXX</p>
                </div>
                <div class="d-flex justify-content-center mb-3">
                <div class="px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                </div>
                    <p class="font-weight-bold text-center px-2" style="margin-top: 3px">Jakarta.no 29</p>
                </div>
            </article>
        </section>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            @role('admin|suplier')
                <h5 class="font-weight-bold mt-4 pt-4">Stock Barang</h5>
                <table class="table table-striped mt-4">
                    <thead>
                    <tr class="">
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Quantity</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangs as $barang)
                        <tr>
                            <td>{{$barang->kode_barang}}</td>
                            <td>{{$barang->nama}}</td>
                            <td>{{$barang->quantity}}</td>
                            <td>{{$barang->created_at->format('d F Y')}}</td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Data Barang Belum Tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @endrole
                @role('admingudang')
                <h5 class="text-muted pt-4 mt-4">Cari Laporan Periode</h5>
                    <div class="row">
                        <div class="d-flex mr-auto">
                            <div class="col-md-7">
                                <input type="date" name="tglawal" id="tglawal" class="form-control" />
                            </div>
                            <div class="col-md-7">
                                <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex pt-3">
                    <a onclick="this.href='cetak/'+ document.getElementById('tglawal').value +
                                '/' + document.getElementById('tglakhir').value" class="btn btn-outline-primary btn-sm">
                                    Cari Laporan
                                </a>
                    <div class="px-1"></div>
                    <a href="{{route('barang.create')}}" class="btn btn-outline-info btn-sm">Tambah Stock</a>
                    </div>
                <table class="table table-striped mt-3">
                    <thead>
                    <tr class="">
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Quantity</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangs as $barang)
                        <tr>
                            <td>
                                <a href="{{route('barang.edit', $barang->id)}}" class="btn btn-outline-primary btn-sm">BRG.2021.13</a>
                            </td>
                            <td>{{$barang->nama}}</td>
                            <td>{{$barang->quantity}}</td>
                            <td>{{$barang->created_at->format('d F Y')}}</td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Data Barang Belum Tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @endrole
            </div>
        </div>
    </div>
</div>
@endsection
