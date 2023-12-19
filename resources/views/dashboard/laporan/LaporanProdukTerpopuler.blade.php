@extends('dashboard.layout.dashboard')

@section('container')
<h2>Laporan Kepuasan Pelanggan</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Pelanggan</th>
          <th scope="col">Rata - rata Penilaian</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($barangs as $item)
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
