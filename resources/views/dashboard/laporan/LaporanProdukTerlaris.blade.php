@extends('dashboard.layout.dashboard')

@section('container')
<h2>Laporan Produk Terlaris</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Nama Barang</th>
            <th scope="col">Terjual Sebanyak</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($barang as $item)
              @php
                  $countdjual = 0;
                  $countdrakitan = 0;
              @endphp
              {{-- Cek Di Djual --}}
              @foreach ($djual as $item2)
                  @if($item->id == $item2->barang_id)
                      @php
                          $countdjual += 1;
                      @endphp
                  @elseif($item2->barang_id == null)
                      @foreach ($drakitan as $item3)
                          @if ($item3->barang_id == $item->id && $item2->rakitan_id == $item3->rakitan_id )
                              @php
                                  $countdrakitan += 1;
                              @endphp
                          @endif
                      @endforeach
                  @endif
              @endforeach
              @if ($countdjual + $countdrakitan != 0)
                  <tr>
                      <td>{{ $item->nama_barang }}</td>
                      <td>{{ $countdjual + $countdrakitan }}</td>
                      {{-- @php
                          $terjual = $countdjual + $countdrakitan;
                          $profit1 = $item->harga - $item->hargabeli;
                          $profitall = $profit1 * $terjual;
                      @endphp
                      <td>Rp{{ number_format($profitall) }}</td> --}}
                  </tr>
              @endif
          @endforeach
        </tbody>
      </table>
</div>
@endsection
