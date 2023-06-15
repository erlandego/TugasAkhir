@extends('dashboard.layout.dashboard')

@section('container')

@if(session()->has('success'))
    <div class="alert alert-success mt-4" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="table-responsive">
    @php $ctr = 1; @endphp
    <table class="table table-striped table-sm mt-4">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Size</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($listsize as $item)
        <tr>
            <td>{{ $ctr }}</td>
            <td>{{ $item->nama_ukuran }}</td>
            <td>
                <form action="/dashboard/size/{{ $item->slug }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus ?')">Delete</button>
                    <a href="/dashboard/size/{{ $item->slug }}/edit" class="btn btn-warning">Edit</a>
                    <a href="/dashboard/size/{{ $item->slug }}" class="btn btn-primary">Detail</a>
                </form>
            </td>
            <?php $ctr+= 1;?>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a class="btn btn-primary mt-4 mb-5" href="/dashboard/size/create"> Tambah Size </a>

@endsection
