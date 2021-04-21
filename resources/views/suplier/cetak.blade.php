@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pt-3">
        <div class="col-md-12">
            <div class="d-flex">
                <h3 class="text-primary font-weight-bold px-3">
                    Laporan Suplier
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
                            <tr>
                            <th>Kode suplier</th>
                            <th>Nama suplier</th>
                            <th>Email</th>
                            <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cetakPertanggal as $suplier)
                            <tr>
                                <td>{{ $suplier->kode_suplier }}</td>
                                <td>{{ $suplier->nama }}</td>
                                <td>{{ $suplier->email }}</td>
                                <td>{{ $suplier->phone }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Data Suplier Belum Tersedia</td>
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
