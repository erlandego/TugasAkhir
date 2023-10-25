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

    function pilih(tipe , namabarang , idbarang , socket , slot , size , dimm , m2 , nvme){
        if(tipe == 'processor'){
            document.getElementById('processor').value = namabarang;
            document.getElementById('processorID').value = idbarang;
            document.getElementById("processorID").dispatchEvent(new Event('input'));

            document.getElementById('socket').value = socket;
            document.getElementById("socket").dispatchEvent(new Event('input'));
        }

        else if(tipe == 'motherboard'){
            document.getElementById('motherboard').value = namabarang;
            document.getElementById('motherboardID').value = idbarang;
            document.getElementById("motherboardID").dispatchEvent(new Event('input'));

            document.getElementById('slot').value = slot;
            document.getElementById("slot").dispatchEvent(new Event('input'));

            document.getElementById('size').value = size;
            document.getElementById("size").dispatchEvent(new Event('input'));

            document.getElementById('dimm').value = dimm;
            document.getElementById("dimm").dispatchEvent(new Event('input'));

            document.getElementById('m2').value = m2;
            document.getElementById("m2").dispatchEvent(new Event('input'));

            document.getElementById('nvme').value = nvme;
            document.getElementById("nvme").dispatchEvent(new Event('input'));

        }

        else if(tipe == 'ram'){
            document.getElementById('ram').value = namabarang;
            document.getElementById('ramID').value = idbarang;
            document.getElementById("ramID").dispatchEvent(new Event('input'));
        }

        else if(tipe == 'vga'){
            document.getElementById('vga').value = namabarang;
            document.getElementById('vgaID').value = idbarang;
            document.getElementById("vgaID").dispatchEvent(new Event('input'));
        }

        else if(tipe == 'fan'){
            document.getElementById('fan').value = namabarang;
            document.getElementById('fanID').value = idbarang;
            document.getElementById("fanID").dispatchEvent(new Event('input'));
        }

        else if(tipe == 'case'){
            document.getElementById('case').value = namabarang;
            document.getElementById('caseID').value = idbarang;
            document.getElementById("caseID").dispatchEvent(new Event('input'));
        }

        else if(tipe == 'psu'){

        }

        document.getElementById('popup').style.display = "none";
        //alert(namabarang);
    }

</script>

@endsection
