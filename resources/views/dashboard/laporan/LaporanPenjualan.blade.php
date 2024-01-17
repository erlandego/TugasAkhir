@extends('dashboard.layout.dashboard')

@section('container')
<h2>Laporan Kepuasan Pelanggan</h2>
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Order ID</th>
          <th scope="col">Total Belanja</th>
          <th scope="col">Keuntungan Yang Didapatkan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($hjual as $item)
            <tr>
                <td onclick="show()"><span data-feather="chevron-down" class="align-text-bottom"></td>
                <td>{{ $item->order_id }}</td>
                <td>{{ number_format($item->total_belanja) }}</td>
                @php
                    $profitfinal = 0;
                    $profit1 = 0;
                    $profitall = 0;
                    $barangcheck = true;
                    foreach ($djual as $key => $value) {
                        if($value->barang_id != null){
                            if($value->hjual_id == $item->id){
                                $profit1 = $value->Barang->harga - $value->Barang->harga_beli;
                                $profitall = $profit1 * $value->qty;
                                $profitfinal += $profitall;
                            }
                        }
                    }

                    // foreach ($djual as $key => $value){
                    //     if($value->rakitan_id != null){
                    //         $barangcheck= false;
                    //         $profitfinal2 = 0;
                    //         $profit12 = 0;
                    //         $profitall2 = 0;
                    //         foreach ($drakitan as $value2) {
                    //             if($value2->rakitan_id == $value->rakitan_id){
                    //                 $profit12 = $value2->Barang->harga - $value2->Barang->harga_beli;
                    //                 $profitall2 = $profit12 * $value2->qty;
                    //                 $profitfinal2 += $profitall2;
                    //             }
                    //         }
                    //     }
                    // }
                @endphp
                <td>@if($barangcheck == true){{ number_format($profitfinal) }}@else {{ number_format($profitfinal2) }} @endif</td>
                <td><a href="/dashboard/transaksi/{{ $item->id }}" class="btn btn-primary">Detail Transaksi</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>

<script>
</script>
@endsection
