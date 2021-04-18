@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                Form Tambah Anggota
            </li>
        </ol>
    </nav>
    <div class="card card-body border-0">
        <form action="{{route('users.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">
                    Nama
                </label>
                <input type="text" name="name" class="form-control" placeholder="Nama...." required>
            </div>
            <div class="form-group">
                <label for="description">
                    Email
                </label>
                <input type="email" name="email" class="form-control" placeholder="Email..." required>
            </div>
            <div class="form-group">
                <label for="level">Akses</label>
                <select name="roles" id="level" class="form-control">
                    <option value="">Pilih akses</option>
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="password">
                    Password
                </label>
                <input type="password" name="password" class="form-control" required>
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
