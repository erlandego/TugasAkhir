@extends('dashboard.layout.dashboard')

@section('container')
    <h2 class="mt-2"> Dashboard Barang </h2>
    <?php $ctr = 1 ?>
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="/dashboard/barang/create" class="btn btn-primary mb-4">Tambah Barang</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga Jual</th>
              <th scope="col">Harga Beli</th>
              <th scope="col">Stok</th>
              <th scope="col">Category</th>
              <th scope="col">Merk</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barangs as $item)
            <tr>
                <td>{{ $ctr }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>Rp{{ number_format($item->harga) }}</td>
                <td>@if($item->harga_beli != null)Rp{{ number_format($item->harga_beli) }}@else - @endif</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->Category->name }}</td>
                <td>{{ $item->Merk->nama_merk }}</td>
                <td>
                    <form action="/dashboard/barang/{{ $item->slug }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus ?')">Delete</button>
                        <a href="/dashboard/barang/{{ $item->slug }}/edit" class="btn btn-warning">Edit</a>
                    </form>
                </td>
                <?php $ctr+= 1 ?>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection
