@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                Perhatian !!! <br>
                Masukan semua informasi permintaan dibawah ini dengan lengkap dan benar.
            </li>
        </ol>
    </nav>
    <div class="card card-body border-0">
        <form action="{{route('request.store', $barangs->id)}}" method="post">
            @csrf
            @if(session('success'))
                    <div class="alert alert-success">
                        {{--  {{ session('success')}}  --}}
                        Terimakasih telah melakukan permintaan pada kami.
                        <br>
                        <label>Silahkan cek sms dan email kamu untuk melihat status permintaan barang kamu, terimakasih.</label>
                    </div>
                @endif
            <label for="" class="font-weight-bold">Data Pribadi</label>
            <div class="mt-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">
                                Nama Lengkap
                            </label>
                            <input type="text" name="nama" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">
                                Alamat
                            </label>
                            <input type="text" name="alamat" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">
                                E-mail
                            </label>
                            <input type="text" name="email" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">
                                Telp
                            </label>
                            <input type="text" name="no_telp" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <label for="" class="font-weight-bold">Detail Permintaan</label>
            <div class="mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">
                                Nama Barang
                            </label>
                            <input type="text" name="barang_id" value="{{ $barangs->nama }}" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">
                                Jumlah Stock
                            </label>
                            <input type="text" name="barang_id" value="{{ $barangs->quantity }}" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">
                                Jumlah Permintaan
                            </label>
                            <input type="text" name="jmlh_permintaan" class="form-control" placeholder="" required>
                        </div>
                    </div>
                </div>
                    <button class="btn btn-outline-primary btn-sm">Kirim Permintaan</button>
                    <a href="{{route('request.index')}}" class="btn btn-outline-info btn-sm" style="margin-left: 10px">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
