@extends('dashboard.layout.dashboard')
@section('container')
    <h2 class="m-5">Beli Barang</h2>
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form method="post" action="/dashboard/belibarang">
        @csrf
        <div class="form-group mb-3">
            <b><label for="ddr">Nama Barang</label></b>
            @livewire('search-barang' , ['checker' => false]);
        </div>

        <div class="form-group mb-3">
            <b><label for="jumlah">Jumlah Barang</label></b>
            <input type="number" class="form-control" id="jumlah" name="jumlah">
        </div>

        <button type="submit" class="btn btn-primary">Tambahkan slot</button>
    </form>

    <script>
        function listgroupclick(barang){
            var pilih = document.getElementById(barang).innerHTML;
            document.getElementById('barang2').value = pilih;
            pilihan();
            resetdata();
        }

        function resetdata(){
            var ulmerk = document.getElementById('ulmerk');
            ulmerk.innerHTML = "";
        }

        function pilihan(){
            var merkpilihan = document.getElementById('barangpilihan');
            var merkpilihan2 = document.getElementById('barang2');
            merkpilihan.value = merkpilihan2.value;
        }
    </script>
@endsection
