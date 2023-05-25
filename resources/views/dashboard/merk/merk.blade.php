@extends('dashboard.layout.dashboard')

@section('container')
@php
    $ctr = 1;
@endphp
<a class="btn btn-primary mt-4" href="/dashboard/merk/create"> Tambah Merk + </a>
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Merk</th>
          <th scope="col">Category Merk</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listmerk as $item)
        <tr>
            <td>{{ $ctr }}</td>
            <td>{{ $item->Merk->nama_merk }}</td>
            <td>{{ $item->Category->name }}</td>
            <td>
                <form action="/dashboard/merk/{{ $item->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus ?')">Delete</button>
                    <a href="/dashboard/merk/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                </form>
            </td>
            <?php $ctr+= 1 ?>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
