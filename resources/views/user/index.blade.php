@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-body border-0">
        <div class="mt-3 mb-3">
            <a class="btn btn-info" href="{{route('users.create')}}">
                Tambah User Baru
            </a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="{{route('users.destroy', $user->id)}}" method="post" type="hidden">
                                @csrf
                                @method('DELETE')

                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
        {{$users->links()}}
    </div>
</div>

@endsection
