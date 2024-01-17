@extends('dashboard.layout.dashboard')

@section('container')
<div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Type</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ArusKas as $item)
            <tr @if($item->type== 'beli') class="table-success" @elseif($item->type == 'jual') class="table-danger" @endif>
                <td>{{ $item ->Barang->nama_barang }}</td>
                <td>Rp{{ number_format($item->Barang->harga_beli) }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->type }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
