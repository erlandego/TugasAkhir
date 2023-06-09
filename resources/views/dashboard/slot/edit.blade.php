@extends('dashboard.layout.dashboard')

@section('container')
<form method="post" action="/dashboard/slot/{{ $slot->id }}">
    @csrf
    @method('put')
    <div class="form-group mt-3 mb-3">
        <b><label for="ddr">Nama Slot</label></b>
        <input type="text" class="form-control" id="ddr" name="ddr" value="{{ $slot->ddr }}">
        @error('ddr')
            <b><p class="text-danger">
                {{ $message }}
            </p></b>
        @enderror
    </div>

    <button class="btn btn-warning" type="submit">Edit</button>
</form>
@endsection
