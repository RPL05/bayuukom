@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pt-3">
        <div class="col-md-12">
            <div class="d-flex">
                <h3 class="text-primary font-weight-bold">
                    Rekap Laporan Penghasilan
                </h3>
                @if (request('tglawal'))
                    <h5 class="text-muted px-1 pt-1 mt-1">{{ request('tglawal') }}
                    sampai {{ request('tglakhir') }}
                    </h5>
                @endif
            </div>
            <hr>
            <div class="container">
                <div class="pt-2">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr class="table-primary">
                            <th>No</th>
                            <th>No. Nota</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis</th>
                            <th>Total Bayar</th>
                            <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cetakPertanggal as $transaksis)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaksis->no_nota }}</td>
                                <td>{{ $transaksis->nama }}</td>
                                <td>{{ $transaksis->masterbiaya->nama_kendaraan }}</td>
                                <td>{{ $transaksis->total_bayar }}</td>
                                <td>{{ $transaksis->created_at->format('d F Y') }}</td>
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
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>
@endsection
