@extends('dashboard.layout.dashboard')

@section('container')
<form method="post" action="/dashboard/slot/{{ $slot->slug }}">
    @csrf
    @method('put')
    <div class="form-group mt-3 mb-3">
        <b><label for="ddr">Nama Slot</label></b>
        <input type="text" class="form-control" id="ddr" name="ddr" value="{{ $slot->ddr }}">
        <input type="hidden" id="slug" name="slug">
        @error('ddr')
            <b><p class="text-danger">
                {{ $message }}
            </p></b>
        @enderror
    </div>

    <button class="btn btn-warning" type="submit">Edit</button>
</form>

<script>
    const name = document.querySelector('#ddr');
    const slug = document.querySelector('#slug');

    name.addEventListener('keyup' , function(){
        fetch('/dashboard/slots/checkSlug?nama=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection
