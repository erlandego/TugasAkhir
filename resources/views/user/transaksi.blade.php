@extends('layout.navbar')

@section('container')
<h3>List Transaksi, {{ auth()->user()->name }}</h3>
<table class="table table-bordered text-center mb-0">
    <thead class="bg-secondary text-dark">
        <tr>
            <th>#</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Tanggal Pembelian</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @foreach ($hjual as $item)
            @foreach ($djual as $item2)
                @if ($item2->hjual_id == $item->id)
                    @if($item2->rakitan_id != null)
                        <tr>
                            <td> - </td>
                            <td>{{ $item2->Rakitan->nama_rakitan }}</td>
                            <td>{{ $item2->subtotal }}</td>
                            <td>{{ $item2->qty }}</td>
                            <td>{{ $item2->created_at }}</td>
                            <td>@if($item->status == 'unpaid' || $item->status == "Unpaid") {{ "Belum dibayar" }} @elseif($item->status == 'Paid' || $item->status == 'paid') {{ "Menunggu Konfirmasi" }} @endif</td>
                            <td>@if($item->status == 'unpaid' || $item->status == "Unpaid") <button onclick="pay({{$item->snapToken }})" class="btn btn-primary" type="button">Pay</button> @elseif($item->status == 'Paid' || $item->status == 'paid') <button class="btn btn-danger" type="button">Batalkan</button> @endif</td>
                        </tr>
                    @elseif($item2->rakitan_id == null)
                        <tr>
                            <td> - </td>
                            <td>{{ $item2->Barang->nama_barang }}</td>
                            <td>{{ $item2->subtotal }}</td>
                            <td>{{ $item2->qty }}</td>
                            <td>{{ $item2->created_at }}</td>
                            <td>@if($item->status == 'unpaid' || $item->status == "Unpaid") {{ "Belum dibayar" }} @elseif($item->status == 'Paid' || $item->status == 'paid') {{ "Menunggu Konfirmasi" }} @endif</td>
                            <td>@if($item->status == 'unpaid' || $item->status == "Unpaid") <button onclick="pay('{{ $item->snap_token }}')" class="btn btn-primary" type="button">Pay</button> @elseif($item->status == 'Paid' || $item->status == 'paid') <button class="btn btn-danger" type="button">Batalkan</button> @endif</td>
                        </tr>
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
</script>
@endsection
