@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pt-3">
        <div class="col-md-12">
            <div class="d-flex">
                <h3 class="text-primary font-weight-bold px-3">
                    Laporan Request Accept
                </h3>
                @if (request('tglawal'))
                    <h5 class="text-muted" style="margin-top: 6px">{{ request('tglawal') }}
                    sampai {{ request('tglakhir') }}
                    </h5>
                @endif
            </div>
            <div class="container">
                <div class="pt-2">
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr class="">
                            <th>Kode Request</th>
                            <th>Nama Barang</th>
                            <th>Nama Suplier</th>
                            <th>Quantity</th>
                            <th>Jumlah Permintaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cetakPertanggal as $barangs)
                            <tr>
                                <td>{{ $barangs->kode_request }}</td>
                                @foreach ($barang as $request)
                                    <td>{{ $request->nama }}</td>
                                @endforeach
                                <td>{{ $barangs->nama }}</td>
                                @foreach ($barang as $request)
                                    <td>{{ $request->quantity }}</td>
                                @endforeach
                                <td>{{ $barangs->jmlh_permintaan }}</td>
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
