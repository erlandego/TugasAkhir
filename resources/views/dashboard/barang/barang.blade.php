@extends('dashboard.layout.dashboard')

@section('container')
    <h2 class="mt-2"> Ini list barang </h2>

    @if(session()->has('success'))
        {{ session('success') }}
    @endif

    <a href="/dashboard/barang/create" class="btn btn-primary mb-4">Tambah Barang</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>Kategori</td>
              <td>
                <a href="#" class="btn btn-danger">Delete</a>
                <a href="#" class="btn btn-warning">Edit</a>
              </td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>Kategori</td>
              <td>
                <a href="#" class="btn btn-danger">Delete</a>
                <a href="#" class="btn btn-warning">Edit</a>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>Kategori</td>
              <td>
                <a href="#" class="btn btn-danger">Delete</a>
                <a href="#" class="btn btn-warning">Edit</a>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>Kategori</td>
              <td>
                <a href="#" class="btn btn-danger">Delete</a>
                <a href="#" class="btn btn-warning">Edit</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
@endsection
