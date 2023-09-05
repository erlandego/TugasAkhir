@extends('layout.navbar')
@section('container')
@php
    $ctr = 1;
    $iduser = auth()->user()->id;
    $yglogin = auth()->user()->name;
    $arr = explode(' ',trim($yglogin));
@endphp
<h2 class="m-5">{{ $arr[0] }}'s Address</h2>
@foreach ($alamat as $item)
    @if ($item->user_id == $iduser)
        <div class="card m-5">
            <div class="card-header">
                {{ $item->alamat }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    @endif
@endforeach
@endsection
