@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="d-flex">
            <h3 class="text-info mr-auto">Data Master Biaya Jasa</h3>
            <a href="{{ route('masterbiaya.create') }}" class="btn btn-success mb-4" style="float: right">
              tambah data
            </a>
        </div>
        <table class="table table-bordered">
            <thead>
              <tr class="table-primary">
                <th>No</th>
                <th>Jenis Kendaraan</th>
                <th>Biaya</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($masterbiayas as $masterbiaya)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $masterbiaya->nama_kendaraan }}</td>
                    <td>{{ $masterbiaya->biaya }}</td>
                    <td>
                        <form action="{{ route('masterbiaya.delete', $masterbiaya->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('masterbiaya.edit', $masterbiaya->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="6">Data Master Biaya Jasa Belum Tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
