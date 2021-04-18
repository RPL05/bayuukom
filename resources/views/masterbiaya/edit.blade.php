@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6">
        <div class="">
            <h5 class="text-info py-2">Edit Master Biaya Jasa</h5>
        </div>
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('masterbiaya.update', $masterbiayas->id) }}" method="post">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama_kendaraan">Jenis Kendaraan</label>
                            <input type="text" name="nama_kendaraan" id="nama_kendaraan" value="{{ $masterbiayas->nama_kendaraan }}" class="form-control" required>
                            <span class="text-danger" id="nama_kendaraan"></span>
                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <input type="number" name="biaya" id="biaya" value="{{ $masterbiayas->biaya }}" class="form-control" required>
                            <span class="text-danger" id="biaya"></span>
                        </div>
                    </div>
                </div>
                <div class="pt-2 mb-2 d-flex">
                    <button type="submit" class="btn btn-outline-info mr-auto">
                        Simpan
                    </button>
                    <a href="{{route('masterbiaya.index')}}" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
