@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="d-flex">
              <h3 class="text-info mr-auto">Daftar Transaksi</h3>
                @role('admin|kasir')
                    <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-4" style="float: right">
                        tambah data
                    </a>
                @endrole
        </div>
        <table class="table table-bordered mt-3">
            <thead>
              <tr class="table-primary">
                <th>No</th>
                <th>No. Nota</th>
                <th>Nama Pelanggan</th>
                <th>Jenis</th>
                <th>Total Bayar</th>
                <th>Tanggal</th>
                @role('admin|kasir')
                    <th>Tindakan</th>
                @endrole
              </tr>
            </thead>
            <tbody>
                @forelse ($transaksis as $transaksi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->no_nota }}</td>
                    <td>{{ $transaksi->nama }}</td>
                    <td>{{ $transaksi->masterbiaya->nama_kendaraan }}</td>
                    <td>{{ $transaksi->total_bayar }}</td>
                    <td>{{ $transaksi->created_at->format('d F Y') }}</td>
                    @role('admin|kasir')
                    <td>
                        <form action="{{ route('transaksi.delete', $transaksi->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('transaksi.rekap', $transaksi->id)}}" class="btn btn-info btn-sm">Cetak Nota</a>
                            <a href="{{ route('transaksi.edit', $transaksi->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    @endrole
                </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="6">Data Transaksi Belum Tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
