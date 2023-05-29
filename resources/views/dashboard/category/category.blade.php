@extends('dashboard.layout.dashboard')

@section('container')

<div class="table-responsive">
    @php $ctr = 1; @endphp
    <table class="table table-striped table-sm mt-4">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($listcat as $item)
        <tr>
            <td>{{ $ctr }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <form action="/dashboard/category/{{ $item->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus ?')">Delete</button>
                    <a href="/dashboard/merk/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                </form>
            </td>
            <?php $ctr+= 1;?>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a class="btn btn-primary mt-4 mb-5" href="/dashboard/category/create"> Tambah Category + </a>
</div>

@endsection
