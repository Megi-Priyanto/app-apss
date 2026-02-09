@extends('layouts.siswa')

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h5>Selamat datang {{ auth()->user()->nama }}</h5>
        </div>
    </div>
@endsection