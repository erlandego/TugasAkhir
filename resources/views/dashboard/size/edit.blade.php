@extends('dashboard.layout.dashboard')

@section('container')
<form method="post" action="/dashboard/size/{{ $size->id }}">
    @csrf
    @method('put')
    <div class="form-group mt-3 mb-2">
        <b><label for="nama_ukuran">Nama Ukuran</label></b>
        <input type="text" class="form-control" id="nama_ukuran" name="nama_ukuran" value="{{ $size->nama_ukuran }}">
        <input type="hidden" name="slug" id="slug">
    </div>

    <button type="submit" class="btn btn-warning">Edit</button>
</form>
<script>
const nama = document.querySelector('#nama_ukuran');
const slug = document.querySelector('#slug');

nama.addEventListener('keyup' , function(){
    fetch('/dashboard/sizes/checkSlug?nama=' + nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
});
</script>
@endsection
