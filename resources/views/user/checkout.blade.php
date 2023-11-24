@extends('layout.navbar')

@section('container')
@php

    // $listbarang = [];
    // foreach ($barangbeli as $key => $value) {
    //     $temp = json_decode($barangbeli[$key]);
    //     array_push($listbarang , $temp);
    // }
    $gambar = "";
    $gambar2 = "";
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
            @foreach ($listdjual as $item)
                @if ($item->hjual_id == $hjual)
                    @if($item->rakitan_id != null && $item->barang_id == null)
                        <tr style="background-color:khaki;">
                            <td onclick = "show()"> <i class="fa fa-sort-desc" aria-hidden="true"> </td>
                            <td>{{ $item->Rakitan->nama_rakitan }}</td>
                            <td>Rp{{ number_format($item->Rakitan->totalharga) }}</td>
                            <td>1</td>
                            <td>Rp{{ number_format($item->Rakitan->totalharga) }}</td>
                        </tr>
                    @elseif($item->rakitan_id == null && $item->barang_id != null)
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
                            <td>Rp{{ number_format($item->subtotal) }}</td>
                        </tr>
                    @endif
                    @if($item->rakitan_id != null)
                        @foreach ($drakitan as $item2)
                            @php
                                foreach ($img as $value){
                                    if($item2->Barang->id == $value->barang_id){
                                        $gambar2 = $value->image;
                                    }
                                }
                            @endphp
                            <tr class="detailrakitan" style="background-color:lemonchiffon">
                                <td class="align-middle"><img src="{{ asset('storage/' . $gambar2) }}" alt="" style="width: 50px;"></td>
                                <td class="align-middle">{{ $item2->Barang->nama_barang }}</td>
                                <td class="align-middle">Rp{{ number_format($item2->Barang->harga) }}</td>
                                <td class="align-middle">{{ $item->qty }}</td>
                                <td class="align-middle">-</td>
                                <td class="align-middle">-</td>
                            </tr>
                        @endforeach
                    @endif
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<button class="btn btn-primary m-5" id="pay-button" href="/pay">Pay</button>


<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
      // Also, use the embedId that you defined in the div above, here.
      window.snap.pay('{{ $snapToken }}', {
        // embedId: 'snap-container',
        onSuccess: function (result) {
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function (result) {
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function (result) {
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function () {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      });
    });

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
