@extends('layout.navbar')

@section('container')

    @php
        $index = 0;
        $checkutama = false;
        $provinsipilihan;
        $kabupatenpilihan;
        $addresspilihan;

        foreach ($listaddress as $value) {
            if($value->utama == 1){
                $checkutama = true;
                $provinsipilihan = $value->provinsi_id;
                $kabupatenpilihan = $value->city_id;
                $addresspilihan = $value->id;
            }
        }

        //Cek Total Berat
        $totalberat = 0;
        foreach ($cart as $value) {
                if($value->user_id == auth()->user()->id){
                    $totalberat += $value->berat;
                }
            }

        $userid = auth()->user()->id;
        $listbeli = [];
        foreach ($cart as $value) {
            if($value->user_id == auth()->user()->id){
                array_push($listbeli , $value);
            }
        }

        $gambar = "";
    @endphp
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>#</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php $index = 0; @endphp
                        @foreach($cart as $item)
                            @if($item->user_id == auth()->user()->id)
                                @php
                                    foreach ($img as $value) {
                                        if($item->Barang->id == $value->barang_id){
                                            $gambar = $value->image;
                                        }
                                    }
                                @endphp
                                @livewire('edit-qty' , [
                                    'qty' => $item->qty,
                                    'idcart' => $item->id,
                                    'harga' => $item->Barang->harga,
                                    'total' => $item->total,
                                    'namabarang' => $item->Barang->nama_barang,
                                    'berat' => $item->berat,
                                    'gambar' => $gambar
                                ], key($index))
                            @endif
                        @php $index++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            @livewire('update-subtotal' , [
                'userid' => auth()->user()->id,
                'addresspilihan' => $addresspilihan
            ])
        </div>

        <div class="row px-xl-5">

            {{-- Pilih Shipping --}}
            @livewire('pilih-shipping' , [
                'provinsi' => $provinsipilihan,
                'kabupaten' => $kabupatenpilihan,
                'berat' => $totalberat,
                'checkutama' => $checkutama
            ])

            {{-- Pilih Paket Shipping --}}
            @livewire('pilih-paket')

            {{-- Alamat User --}}
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Alamat Pengiriman</h4>
                    </div>
                    <div class="card-body">
                        @if($checkutama == false)
                            <h6>Anda belum memilih alamat</h6>
                            <a href="/alamat" class="btn btn-primary"> Pilih Alamat </a>
                        @else
                            @foreach ($listaddress as $item)
                                @if($item->utama == 1)
                                    <b>{{ $item->alamat }}</b><br>
                                    {{ $item->Kecamatan->subdistrict_name }}<br>
                                    {{ $item->City->city_name }}<br>
                                    {{ $item->Provinsi->nama_provinsi }}<br>
                                @endif
                            @endforeach
                            <a href="/alamat" class="btn btn-primary mt-2">Ubah Alamat</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <script>

    </script>
@endsection
