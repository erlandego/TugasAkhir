@extends('dashboard.layout.dashboard')

@section('container')
@php
    $count = 1;
@endphp
<h2>Laporan Kepuasan Pelanggan</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Stok Barang</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($barang as $item)
        <tr>
            <td>{{ $count }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->stok }}</td>
        </tr>
        @php
            $count++;
        @endphp
        @endforeach
      </tbody>
    </table>
</div>
@endsection
