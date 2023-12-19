@extends('layout.navbar')

@section('container')
@php
    $gambar = "";
    $gambar2 = "";
@endphp
<h3>List Transaksi, {{ auth()->user()->name }}</h3>
@if(session()->has('received'))
    <div class="alert alert-success" role="alert">
        {{ session('received') }}
    </div>
@endif
<table class="table table-bordered text-center m-0">
    <thead class="bg-secondary text-dark">
        <tr>
            <th>#</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Tanggal Pembelian</th>
            <th>Status</th>
            <th>Action</th>
            <th>Penilaian</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @foreach ($hjual as $item)
            @foreach ($djual as $item2)
                @if ($item2->hjual_id == $item->id)
                    @if($item2->rakitan_id != null)
                        <tr style="background-color: khaki">
                            <td onclick="show()"> <i class="fa fa-sort-desc" aria-hidden="true"> </td>
                            <td>{{ $item2->Rakitan->nama_rakitan }}</td>
                            <td>Rp{{ number_format($item2->subtotal) }}</td>
                            <td>{{ $item2->qty }}</td>
                            <td>{{ $item2->created_at }}</td>
                            <td>
                                @if ($item->status == 'unpaid')
                                    {{ "Belum Dibayar" }}
                                @elseif($item->status == 'Paid')
                                    {{ "Menunggu Konfirmasi" }}
                                @elseif($item->status == 'expire')
                                    {{ "Expire" }}
                                @elseif($item->status == 'confirmed')
                                    {{ "Barang Sedang Diproses" }}
                                @elseif($item->status == 'sent')
                                    {{ "Barang Sedang Dalam Pengiriman" }}
                                @elseif($item->status == 'Selesai')
                                    {{ "Selesai" }}
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 'unpaid')
                                    <button type="button" class="btn btn-primary" onclick="pay('{{ $item->snap_token }}')">Pay</button>
                                @elseif($item->status == 'Paid')
                                    <button type="button" class="btn btn-danger">Batalkan</button>
                                @elseif($item->status == 'expire')
                                    {{ "-" }}
                                @elseif($item->status == 'confirmed')
                                    {{ "-" }}
                                @elseif($item->status == 'sent')
                                    <a href="/received/{{ $item->id }}" class="btn btn-success">Pesanan Sudah Diterima</a>
                                @else
                                    {{ "-" }}
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 'Selesai')
                                    @if($item->rating == null)
                                        <div class="ratingview">
                                            <div class="ratingpelanggan">
                                                <input type="radio" onclick="rate({{ $item->id }} , 5)" name="rate" id="rate-5">
                                                <label for="rate-5" class="fas fa-star"></label>
                                                <input type="radio" onclick="rate({{ $item->id }} , 4)" name="rate" id="rate-4">
                                                <label for="rate-4" class="fas fa-star"></label>
                                                <input type="radio" onclick="rate({{ $item->id }} , 3)" name="rate" id="rate-3">
                                                <label for="rate-3" class="fas fa-star"></label>
                                                <input type="radio" onclick="rate({{ $item->id }} , 2)" name="rate" id="rate-2">
                                                <label for="rate-2" class="fas fa-star"></label>
                                                <input type="radio" onclick="rate({{ $item->id }} , 1)" name="rate" id="rate-1">
                                                <label for="rate-1" class="fas fa-star"></label>
                                            </div>
                                        </div>
                                    @else
                                        {{ $item->rating }} <label for="rate-4" class="fas fa-star" style="color:#fd4"></label>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @elseif($item2->rakitan_id == null)
                        @php
                            foreach ($img as $value){
                                if($item2->Barang->id == $value->barang_id){
                                    $gambar2 = $value->image;
                                    break;
                                }
                            }
                        @endphp
                        <tr>
                            <td> <img src="{{ asset('storage/' . $gambar2) }}" alt="" style="width: 70px;"> </td>
                            <td>{{ $item2->Barang->nama_barang }}</td>
                            <td>Rp{{ number_format($item2->subtotal) }}</td>
                            <td>{{ $item2->qty }}</td>
                            <td>{{ $item2->created_at }}</td>
                            <td>
                                @if ($item->status == 'unpaid')
                                    {{ "Belum Dibayar" }}
                                @elseif($item->status == 'Paid')
                                    {{ "Menunggu Konfirmasi" }}
                                @elseif($item->status == 'expire')
                                    {{ "Expired" }}
                                @elseif($item->status == 'confirmed')
                                    {{ "Barang Sedang Dikirim" }}
                                @elseif($item->status == 'sent')
                                    {{ "Barang Sedang Dalam Pengiriman" }}
                                @elseif($item->status == 'Selesai')
                                    {{ "Selesai" }}
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 'unpaid')
                                    <button type="button" class="btn btn-primary" onclick="pay('{{ $item->snap_token }}')">Pay</button>
                                @elseif($item->status == 'Paid')
                                    <button type="button" class="btn btn-danger">Batalkan</button>
                                @elseif($item->status == 'expire')
                                    {{ "-" }}
                                @elseif($item->status == 'confirmed')
                                    {{ "-" }}
                                @elseif($item->status == 'sent')
                                    <a href="/received/{{ $item->id }}" class="btn btn-success">Pesanan Sudah Diterima</a>
                                @else
                                    {{ "-" }}
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 'Selesai')
                                    @if($item->rating == null)
                                        <div class="ratingview">
                                            <div class="ratingpelanggan">
                                                <input type="radio" onclick="rate({{ $item->id }} , 5)" name="rate" id="rate-5">
                                                <label for="rate-5" class="fas fa-star"></label>
                                                <input type="radio" onclick="rate({{ $item->id }} , 4)" name="rate" id="rate-4">
                                                <label for="rate-4" class="fas fa-star"></label>
                                                <input type="radio" onclick="rate({{ $item->id }} , 3)" name="rate" id="rate-3">
                                                <label for="rate-3" class="fas fa-star"></label>
                                                <input type="radio" onclick="rate({{ $item->id }} , 2)" name="rate" id="rate-2">
                                                <label for="rate-2" class="fas fa-star"></label>
                                                <input type="radio" onclick="rate({{ $item->id }} , 1)" name="rate" id="rate-1">
                                                <label for="rate-1" class="fas fa-star"></label>
                                            </div>
                                        </div>
                                    @else
                                        {{ $item->rating }} <label for="rate-4" class="fas fa-star" style="color:#fd4"></label>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if($item2->rakitan_id != null)
                        @foreach ($drakitan as $item3)
                            @if ($item3->rakitan_id == $item2->rakitan_id)
                                @php
                                    foreach ($img as $value){
                                        if($item3->Barang->id == $value->barang_id){
                                            $gambar = $value->image;
                                            break;
                                        }
                                    }
                                @endphp
                                <tr style="background-color: lemonchiffon" class="detailrakitan">
                                    <td><img src="{{ asset('storage/' . $gambar) }}" alt="" style="width: 70px;"></td>
                                    <td>{{ $item3->Barang->nama_barang }}</td>
                                    <td>Rp{{ number_format($item3->Barang->harga) }}</td>
                                    <td>1</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endif
            @endforeach
        @endforeach
    </tbody>
</table>

<script>
    function pay(snaptoken){
        window.snap.pay(snaptoken, {
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
    }

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

    function rate(hjualid , rating){
        fetch('/rating?hjualid=' + hjualid + '&rating=' + rating)
            .then(location.reload())
    }
</script>
@endsection
