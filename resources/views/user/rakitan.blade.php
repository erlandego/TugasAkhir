@extends('layout.navbar')

@section('container')
@php
 $gambar = "";
@endphp

@livewire('form-rakit' , [
    'gambar' => $image,
    'barang' => $barang
])

<script>
    document.getElementById('popup').style.display = "none";

    function popup(){
        document.getElementById('popup').style.display = "";
    }

    function pilih(tipe , namabarang , idbarang , socket){
        if(tipe == 'processor'){
            document.getElementById('processor').value = namabarang;
            document.getElementById('processorID').value = idbarang;
            document.getElementById("processorID").dispatchEvent(new Event('input'));

            document.getElementById('socket').value = socket;
            document.getElementById("socket").dispatchEvent(new Event('input'));
        }

        else if(tipe == 'motherboard'){
            document.getElementById('motherboard').value = namabarang;
        }

        document.getElementById('popup').style.display = "none";
        //alert(namabarang);
    }

</script>

@endsection
