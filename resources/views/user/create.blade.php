@extends('layout.navbar')
@section('container')
    <h2 class="ml-5"></h2>
    <form method="post" action='/alamat'>
        @csrf
        @livewire('pilih-alamat' , [
            'listprovinsi' => $listprovinsi
        ])

        <div class="form-group ml-5 mt-2">
            <b><label for="alamat_lengkap">Alamat Lengkap</label></b>
            <textarea type="textarea" class="form-control" id="alamat_lengkap" name="alamat_lengkap"></textarea>
        </div>

        <button type="submit" class="btn btn-primary ml-5">Tambah</button>
    </form>
@endsection
