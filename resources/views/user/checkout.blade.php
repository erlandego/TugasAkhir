@extends('layout.navbar')

@section('container')
@php

    // $listbarang = [];
    // foreach ($barangbeli as $key => $value) {
    //     $temp = json_decode($barangbeli[$key]);
    //     array_push($listbarang , $temp);
    // }
    $gambar = "";
@endphp
<div class="card m-5">
    <h6 class="card-header">Pengiriman ke :</h6>
    <div class="card-body">
      <h6 class="card-title">{{ $alamat[0]->alamat }}</h6>
      <p class="card-text">{{ $alamat[0]->Kecamatan->subdistrict_name }} <br>
        {{ $alamat[0]->City->city_name }} <br>
        {{ $alamat[0]->Provinsi->nama_provinsi }}
      </p>
    </div>
</div>

<div class="col-lg-11 table-responsive m-5">
    <table class="table table-bordered text-center mb-0">
        <thead class="bg-secondary text-dark">
            <tr>
                <th>#</th>
                <th>Products</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @foreach ($cart as $item)
                @foreach ($barangbeli as $item2)
                    @if ($item->id == $item2)
                        @php
                            foreach ($img as $value) {
                                if($item->barang_id == $value->barang_id){
                                    $gambar = $value->image;
                                }
                            }
                        @endphp
                        <tr>
                            <td><img src="{{ asset('storage/' . $gambar) }}" alt="" style="width: 50px;"></td>
                            <td>{{ $item->Barang->nama_barang }}</td>
                            <td>Rp{{ number_format($item->Barang->harga) }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp{{ number_format($item->total) }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

<button class="btn btn-primary m-5" type="submit" id="btnPay">Pay</button>
@endsection
