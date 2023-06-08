@extends('dashboard.layout.dashboard')

@section('container')
<form action="/dashboard/socket" method="post">
    @csrf
    <div class="form-group mb-3 mt-3">
        <b><label for="nama_socket">Nama Socket</label></b>
        <input type="text" class="form-control" id="nama_socket" name="nama_socket">
        @error('nama_socket')
            <p class="text-danger">
                @php echo $message @endphp
            </p>
            {{-- @php echo '<script>alert("'.$message.'")</script>' @endphp --}}
        @enderror
    </div>

    <div class="form-group mb-3">
        <b><label for="merk_id">Merk Socket</label></b>
        <select class="form-control" id="merk_id" name="merk_id">
            @foreach ($merks as $item)
                <option value="{{ $item->Merk->id }}">{{ $item->Merk->nama_merk }}</option>
            @endforeach
        </select>
        @error('merk_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambah Socket</button>
</form>
@endsection
