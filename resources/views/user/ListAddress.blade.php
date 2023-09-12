@extends('layout.navbar')
@section('container')
@php
    $ctr = 1;
    $iduser = auth()->user()->id;
    $yglogin = auth()->user()->name;
    $arr = explode(' ',trim($yglogin));
@endphp
    <h2 class="m-5">{{ $arr[0] }}'s Address</h2>
    <a class="btn btn-primary ml-5" href="/alamat/create">Tambahkan alamat baru</a>
    @livewire('ganti-alamat' , [
        'alamat' => $alamat,
        'iduser' => $iduser
    ])
@endsection
