@extends('layouts.app')

@section('content')
<div class="d-flex bd-cheatsheet container-fluid bg-body">
    <div class="col-md-2" style="margin-top : -28px">
        <section id="content">
            <h5 class="sticky-xl-top fw-bold pt-3 pt-xl-5 pb-2 pb-xl-3" style="margin-left : 100px">{{ auth()->user()->roles->first()->name }}</h5>
            <article>
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2 text-center">
                    <img src="{{asset('image/awww.png')}}" class="rounded-circle mt-3" width="80px" alt="">
                    <p class="font-weight-bold text-center pt-2">Steave Jobs</p>
                </div>
                <p class="text-muted text-center"style="margin-top: -15px">steavejobs@mail.com
                    <a href="http://" class="btn btn-outline-primary btn-sm btn-block mt-3">Invite Member</a>
                </p>
                <div class="d-flex justify-content-center" style="margin-top: 15px">
                <div class="px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                </div>
                    <p class="font-weight-bold text-center px-2" style="margin-top: 3px">+62 XXXXXX</p>
                </div>
                <div class="d-flex justify-content-center mb-3">
                <div class="px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                </div>
                    <p class="font-weight-bold text-center px-2" style="margin-top: 3px">Jakarta.no 29</p>
                </div>
            </article>
        </section>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card border-0 shadow">
                    <div class="card-body d-flex">
                        <h6 class="text-muted">Stock Barang</h6>
                        <h5 class="ml-auto">210</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow">
                    <div class="card-body d-flex">
                        <h6 class="text-muted">Request</h6>
                        <h5 class="ml-auto">100</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow">
                    <div class="card-body d-flex">
                        <h6 class="text-muted">Barang Keluar</h6>
                        <h5 class="ml-auto">100</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow">
                    <div class="card-body d-flex">
                        <h6 class="text-muted">Barang Masuk</h6>
                        <h5 class="ml-auto">100</h5>
                    </div>
                </div>
            </div>
            <div class="container">
            <div class="col-md-12" style="margin-left : 20px">
                <h5 class="font-weight-bold mt-4">Data Members</h5>
                    <a href="{{route('users.create')}}" class="btn btn-outline-primary btn-sm mt-2">Tambah Member</a>
                <table class="table table-striped mt-4">
                    <thead>
                    <tr class="">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->roles->first()->name}}</td>
                            <td>
                                <form action="{{route('users.destroy', $user->id)}}" method="post" type="hidden">
                                @csrf
                                @method('DELETE')

                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-info btn-sm">
                                    Edit
                                </a>

                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Data User Belum Tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
