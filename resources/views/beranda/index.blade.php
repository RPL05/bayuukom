@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="text-primary">Selamat Datang di Aplikasi Kasir Jasa Suci</h1>
        <div class="d-flex">
            <h4>Halo</h4>
            <h4 class="font-weight-bolder px-1">{{ Auth::user()->name }},</h4>
            <h4>anda login sebagai</h4>
            <h4 class="font-weight-bolder px-1">
                {{ auth()->user()->roles->first()->name }}
            </h4>
        </div>
    </div>
</div>
@endsection
