@extends('dashboard.layout.dashboard')

@section('container')
@php $ctr = 1 @endphp
<h2 class="mt-2">List User</h2>

<table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $item)
      <tr>
          <td>{{ $ctr }}</td>
          <td>{{ $item->name }}</td>
          <td>@if($item->is_admin == 1) {{ "Admin" }} @else {{ "User" }} @endif</td>
          <td>{{ $item->is_admin }}</td>
          <td>
            <a href="#" class="btn btn-danger">Detail</a>
            <a href="#" class="btn btn-warning">Ban</a>
          </td>
          <?php $ctr+= 1 ?>
      </tr>
      @endforeach
    </tbody>
</table>
@endsection
