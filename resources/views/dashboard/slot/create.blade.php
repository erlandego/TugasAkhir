@extends('dashboard.layout.dashboard')

@section('container')
<h2 class="mb-3 mt-2">Tambah Slot Baru</h2>
<form method="post" action="/dashboard/slot">
    @csrf
    <div class="form-group mb-3">
        <b><label for="ddr">Nama Slot</label></b>
        <input type="text" class="form-control" id="ddr" name="ddr">
        <input type="hidden" id="slug" name="slug">
        @error('ddr')
            <b><p class="text-danger">
                {{ $message }}
            </p></b>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambahkan slot</button>
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
