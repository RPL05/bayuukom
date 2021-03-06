@extends('layouts.app')

@section('content')
<div class="d-flex bd-cheatsheet container-fluid bg-body">
    <div class="col-md-2" style="margin-top : -28px">
        <section id="content">
            <h5 class="sticky-xl-top fw-bold pt-3 pt-xl-5 pb-2 pb-xl-3"  style="margin-left : 60px">{{ auth()->user()->roles->first()->name }}</h5>
            <article>
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2 text-center">
                    <img src="{{asset('image/awww.png')}}" class="rounded-circle mt-3" width="80px" alt="">
                    <p class="font-weight-bold text-center pt-2">{{ auth()->user()->name }}</p>
                </div>
                <p class="text-muted text-center"style="margin-top: -15px">{{ auth()->user()->email }}
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
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body d-flex">
                        <h6 class="text-muted">Stock Barang</h6>
                        <h5 class="ml-auto">
                            {{ $barang->sum('quantity') }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body d-flex">
                        <h6 class="text-muted">Request</h6>
                        <h5 class="ml-auto">
                            {{ $totalrequest }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body d-flex">
                        <h6 class="text-muted">Permintaan <br> Di terima</h6>
                        <h5 class="ml-auto">{{ $totalrequest }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body d-flex">
                        <h6 class="text-muted">Permintaan <br> Di tolak</h6>
                        <h5 class="ml-auto">{{ $totalrequest }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-left : 20px">
                <h5 class="font-weight-bold mt-4">Request</h5>
                <div class="d-flex pt-2">
                    <a href="{{route('request.accept')}}" class="btn btn-outline-primary btn-sm">Accept</a>
                    <div class="px-2">
                        <a href="{{route('request.riject')}}" class="btn btn-outline-info btn-sm">Riject</a>
                    </div>
                </div>
                <table class="table table-striped mt-4">
                    <thead>
                    <tr class="">
                        <th>Kode Request</th>
                        <th>Kode Barang</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($permintaan as $barangs)
                            <tr>
                                <td>{{ $barangs->kode_request }}</td>
                                @foreach ($barang as $brngs)
                                    <td>{{ $brngs->kode_barang }}</td>
                                @endforeach
                                <td>{{ $barangs->jmlh_permintaan }}</td>
                            <td>
                                <span class="badge badge-secondary">Waiting</span>
                            </td>
                            <td>
                                <a href="{{ route('request.show', $barangs->id) }}" class="btn btn-outline-info btn-sm">Details</a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Data Request Belum Tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
