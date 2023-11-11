@extends('dashboard.layout.dashboard')

@section('container')
    @php $cari = 0; @endphp
    <form method="post" action="/dashboard/merk/{{ $merk->slug }}">
    @csrf
    @method('put')
    {{-- Nama Merk --}}
    <div class="divnama mb-3">
        <div class="form-group">
            <b><label for="nama_merk">Nama Merk</label></b>
            <input type="text" class="form-control" id=nama_merk name="nama_merk" value="{{ $merk->nama_merk }}" required>
            <input type="hidden" id="slug" name="slug">
        </div>
        @error('nama_merk')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Category Merk --}}
    <div class="form-group mb-3">
        <b><label>Category</label></b>
        @foreach ($listcategory as $item)
            @foreach($merkcat as $itm)
                @if($itm->merk_id == $merk->id && $itm->category_id == $item->id)
                    @php $cari = 1 @endphp
                @endif
            @endforeach
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="category[]" value="{{ $item->id }}" id="{{ $item->name }}" @if($cari == 1) checked @endif>
                <label class="form-check-label" for="{{ $item->name }}">
                        {{ $item->name }}
                </label>
            </div>
            @php $cari = 0 @endphp
        @endforeach
        @error('category')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <button type="submit" class="btn btn-warning">Edit +</button>
    </form>

    <script>
        const slug = document.querySelector('#slug');
        const nama_merk = document.querySelector('#nama_merk');

        nama_merk.addEventListener('keyup' , function(){
            fetch('/dashboard/merks/checkSlug?nama=' + nama_merk.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
