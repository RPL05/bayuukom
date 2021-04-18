@extends('layouts.cetak')

@section('content')
<div class="row">
    <div class="col-md-12">
        <label>
            <?php echo date('(d-m-Y)'); ?>
        </label>
        <label style="margin: 0 0 50px 35%;">
            Aplikasi Jasa Cuci
        </label>
        <h3 class="mt-3 text-center">
            Cuci Bersih Mobil Motor
        </h3>
        @foreach($transaksis as $transaksi)
            <h4 class="mt-4">Nota Nomor : {{ $transaksi->no_nota }} </h4>
        @endforeach
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
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->nama }}</td>
                        <td>{{ $transaksi->masterbiaya->nama_kendaraan }}</td>
                        <td>Rp. {{ $transaksi->bayar }}</td>
                        <td>Rp. {{ $transaksi->kembalian }}</td>
                        <td>Rp. {{ $transaksi->total_bayar }}</td>
                        <td>{{ $transaksi->created_at->toFormattedDateString()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin: 0 0 50px 75%;">
            <p style="margin-bottom: 60px;">Petugas Kasir</p>

        </div>
        <center>-------------------- Terima Kasih ------------------- </center>
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>
@endsection
