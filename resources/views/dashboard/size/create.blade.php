@extends('dashboard.layout.dashboard')

@section('container')
<form method="post" action="/dashboard/size">
    @csrf
    <div class="form-group mb-2 mt-3">
        <b><label for="nama_ukuran">Nama Ukuran</label></b>
        <input type="text" class="form-control" id="nama_ukuran" name="nama_ukuran" required>
        <input type="hidden" id="slug" name="slug">
    </div>
    @error('nama_ukuran')
        <b><p class="text-danger">
            {{ $message }}
        </p></b>
    @enderror

    <button class="btn btn-primary" type="submit">Tambah Size</button>
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
