@extends('dashboard.layout.dashboard')

@section('container')
<h2>Laporan Kepuasan Pelanggan</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Nama User</th>
          <th scope="col">Nama Rakitan</th>
          <th scope="col">Sudah Di Checkout</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rakitan as $item)
        <tr>
            <td>{{ $item->User->name }}</td>
            <td>{{ $item->nama_rakitan }}</td>
            @php
                $check = false;
                foreach ($djual as $key => $value) {
                    if($value->rakitan_id == $item->id){
                        $check = true;
                    }
                }
            @endphp
            <td>@if($check == true) V @else X @endif</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
