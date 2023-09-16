@extends('layout.navbar')
@section('container')
    <h2 class="ml-5"></h2>
    <form method="post" action='/alamat'>
        @csrf

        <div class="form-group ml-5 mt-2">
            <b><label for="nama">Nama Alamat</label></b>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>

        @livewire('pilih-alamat' , [
            'listprovinsi' => $listprovinsi,
            'dariedit' => false,
            'alamat' => null
        ])

        <div class="form-group ml-5 mt-2">
            <b><label for="alamat">Alamat Lengkap</label></b>
            <textarea type="textarea" class="form-control" id="alamat" name="alamat"></textarea>
        </div>

        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">

        <button type="submit" class="btn btn-primary ml-5">Tambah</button>
    </form>
@endsection
