@extends('dashboard.layout.dashboard')

@section('container')
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga</th>
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
