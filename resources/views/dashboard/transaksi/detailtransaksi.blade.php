@extends('dashboard.layout.dashboard')

@php
    $gambar = "";
    $gambar2 = "";
@endphp
@section('container')
    <h3>Detail Transaksi, {{ $hjual[0]->User->name }}</h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($djual as $item)
                @if ($item->rakitan_id == null)
                    @php
                        foreach ($img as $value) {
                            if($item->barang_id == $value->barang_id){
                                $gambar = $value->image;
                                break;
                            }
                        }
                    @endphp
                    <tr>
                        <td><img src="{{ asset('storage/'. $gambar) }}" style="width: 50px"></td>
                        <td>{{ $item->Barang->nama_barang }}</td>
                        <td>Rp{{ number_format($item->Barang->harga) }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp{{ number_format($item->subtotal) }}</td>
                    </tr>
                @elseif($item->rakitan_id != null)
                    <tr>
                        <td onclick="show()"><span data-feather="chevron-down" class="align-text-bottom"></td>
                        <td>{{ $item->Rakitan->nama_rakitan }}</td>
                        <td>{{ number_format($item->subtotal) }}</td>
                        <td>1</td>
                        <td>{{ number_format($item->subtotal) }}</td>
                    </tr>
                @endif

                @if($item->rakitan_id != null)
                    @foreach ($drakitan as $item2)
                        @if ($item2->rakitan_id == $item->rakitan_id)
                            @php
                                foreach ($img as $value) {
                                    if($item2->barang_id == $value->barang_id){
                                        $gambar2 = $value->image;
                                        break;
                                    }
                                }
                            @endphp
                            <tr class="detailrakitan">
                                <td><img src="{{ asset('storage/'. $gambar2) }}" style="width: 50px"></td>
                                <td>{{ $item2->Barang->nama_barang }}</td>
                                <td>Rp{{ number_format($item2->Barang->harga) }}</td>
                                <td>{{ $item2->qty }}</td>
                                <td>Rp{{ number_format($item->subtotal) }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-primary" onclick="history.back()">Back</button>

    <script>
        var detailrakitan = document.getElementsByClassName("detailrakitan");
        for (let index = 0; index < detailrakitan.length; index++) {
            detailrakitan[index].style.display = "none";
        }

        function show(){
            for (let index = 0; index < detailrakitan.length; index++) {
                if(detailrakitan[index].style.display == "none"){
                    detailrakitan[index].style.display = "";
                }else{
                    detailrakitan[index].style.display = "none";
                }
            }
        }
    </script>
@endsection
