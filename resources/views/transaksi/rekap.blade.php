@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-3 text-center">
                Cuci Bersih Mobil Motor
            </h3>
                <h4 class="mt-4">Nota Nomor : {{ $nota->no_nota }} </h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Jenis</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                        <th>Total Bayar</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $nota->nama }}</td>
                            <td>{{ $nota->masterbiaya->nama_kendaraan }}</td>
                            <td>Rp. {{ $nota->bayar }}</td>
                            <td>Rp. {{ $nota->bayar - $nota->masterbiaya->biaya }}

                            </td>
                            <td>Rp. {{ $nota->total_bayar }}</td>
                            <td>{{ $nota->created_at->toFormattedDateString()}}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>
@endsection
