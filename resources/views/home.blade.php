@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- <div class="card"> -->
                <!-- <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                        <div class="jumbotron" style="background-image: url('image/undraw_quitting_time_dm8t.png')">
                            <div class="container">
                                <h5 class="text-center">Selamat Datang di Aplikasi Permintaan Barang</h5>
                                <h5 class="text-center">Ujikompetensi Rekayasa Perangkat Lunak</h5>
                                <h4 class="text-center mt-5 pt-5">Muhamad Bayu Setiawan</h4>
                            </div>
                        </div>



                    {{-- <!-- Form Kirim Email -->
                    <form action="{{ route('send.email') }}" method="POST" class="form">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="email_body" placeholder="Enter your message here..."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                    <!-- End Form Kirim Email --> --}}
                    <!-- You are logged in! -->
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
