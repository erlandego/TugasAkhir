@extends('dashboard.layout.dashboard')

@section('container')
<form method="post" action="/dashboard/category">
    @csrf
    <div class="form-group mb-3 mt-4">
        <b><label for="name">Nama Category</label></b>
        <input type="text" class="form-control" name="name" id="name">
        <input type="hidden" name="slug" id="slug">
    </div>
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    <div class="form-group mb-3" id="divimage">
        @livewire('upload-imagecat' , [
            'idcat' => null,
            'dariedit' => false
        ])
    </div>

    <button id="submit" class="btn btn-primary" type="submit">Tambah Category</button>
</form>
<script>
    const slug = document.querySelector('#slug');
    const name = document.querySelector('#name');
    const submit = document.querySelector('#submit');

    name.addEventListener('keyup' , function(){
        fetch('/dashboard/categories/checkSlug?nama=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

</script>
@endsection
