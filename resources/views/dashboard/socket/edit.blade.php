@extends('dashboard.layout.dashboard')

@section('container')
<form action="/dashboard/socket/{{ $socket->id }}" method="post">
    @csrf
    @method('put')
    <div class="form-group mb-3 mt-3">
        <b><label for="nama_socket">Nama Socket</label></b>
        <input type="text" class="form-control" id="nama_socket" name="nama_socket" value="{{ $socket->nama_socket }}">
        @error('nama_socket')
            <p class="text-danger">
                @php echo $message @endphp
            </p>
        @enderror
    </div>

    <div class="form-group mb-3">
        <b><label for="merk_id">Merk Socket</label></b>
        <select class="form-control" id="merk_id" name="merk_id">
            @foreach ($merks as $item)
                @if($item->merk_id == $socket->merk_id){
                    <option value="{{ $item->Merk->id }}" selected>{{ $item->Merk->nama_merk }}</option>
                }
                @else{
                    <option value="{{ $item->Merk->id }}">{{ $item->Merk->nama_merk }}</option>
                }
                @endif
            @endforeach
        </select>
        @error('merk_id')
            <p class="text-danger">
                @php echo $message @endphp
            </p>
        @enderror
    </div>

    <button type="submit" class="btn btn-warning">Edit Socket</button>
</form>
@endsection
