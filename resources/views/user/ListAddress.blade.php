@extends('layout.navbar')
@section('container')
@php
    $ctr = 1;
    $iduser = auth()->user()->id;
    $yglogin = auth()->user()->name;
    $arr = explode(' ',trim($yglogin));
@endphp
    <h2 class="m-5">{{ $arr[0] }}'s Address</h2>
    <button class="btn btn-primary" href="">Tambahkan alamat baru</button>
    @livewire('ganti-alamat' , [
        'alamat' => $alamat,
        'iduser' => $iduser
    ])
@endsection
