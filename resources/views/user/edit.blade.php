@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                Form Edit Data AJC
            </li>
        </ol>
    </nav>
    <div class="card card-body border-0">
        <form action="{{route('users.update', $user->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">
                    Nama Anggota
                </label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Nama Anggota...." required>
            </div>
            <div class="form-group">
                <label for="description">
                    Email
                </label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Email..." required>
            </div>
            <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-info">
                    Tambah
                </button>
                <a href="{{route('users.index')}}" class="btn btn-light">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
