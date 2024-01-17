@extends('dashboard.layout.dashboard')

@section('container')
<h2>Laporan Pembelian</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Nama Barang</th>
          <th scope="col">Jumlah yang Dibeli</th>
          <th scope="col">Tanggal Pembelian</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($aruskas as $item)
            <tr>
                <td>{{ $item->Barang->nama_barang }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
