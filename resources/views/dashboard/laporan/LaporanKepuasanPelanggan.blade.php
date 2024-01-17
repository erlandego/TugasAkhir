@extends('dashboard.layout.dashboard')

@section('container')
<h2>Laporan Kepuasan Pelanggan</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Nama Pelanggan</th>
          <th scope="col">Rata - rata Penilaian</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($hjual as $item)
        <tr>
            <td>{{ $item->User->name }}</td>
            <td><label for="rate-3" style="color:#fd4" class="fas fa-star"></label>{{ floatval($item->Rating) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
