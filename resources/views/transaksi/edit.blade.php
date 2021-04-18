@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6">
        <div class="">
            <h5 class="text-info py-2">Tambah Master Biaya Jasa</h5>
        </div>
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('transaksi.update', $transaksis->id) }}" method="post">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                @method('put')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="masterbiaya_id">Jenis Kendaraan</label>
                            <select name="masterbiaya_id" id="" class="form-control">
                                <option value="">Pilih Jenis Kendaraan</option>
                                @foreach($masterbiayas as $masterbiaya)
                                    <option value="{{$masterbiaya->id}}">{{$masterbiaya->nama_kendaraan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bayar">Bayar</label>
                            <input type="number" name="bayar" id="bayar" value="{{ $transaksis->bayar }}" class="form-control" required>
                            <span class="text-danger" id="bayar"></span>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar</label>
                            <input type="number" name="total_bayar" id="total_bayar" value="{{ $transaksis->total_bayar }}" class="form-control" required>
                            <span class="text-danger" id="total_bayar"></span>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" name="nama" id="nama" value="{{ $transaksis->nama }}" class="form-control" required>
                            <span class="text-danger" id="nama"></span>
                        </div>
                    </div>
                </div>
                <div class="pt-2 mb-2 d-flex">
                    <button type="submit" class="btn btn-outline-info mr-auto">
                        Simpan
                    </button>
                    <a href="{{route('transaksi.index')}}" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
