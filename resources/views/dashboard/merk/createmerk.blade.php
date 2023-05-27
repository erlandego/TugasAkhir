@extends('dashboard.layout.dashboard')

@section('container')
    <form method="post" action="/dashboard/merk">
    @csrf
    {{-- Nama Merk --}}
    <div class="divnama mb-3">
        <div class="form-group">
            <b><label for="nama_merk">Nama Merk</label></b>
            <input type="text" class="form-control" id=nama_merk name="nama_merk" value="{{ old('nama_merk') }}" required>
        </div>
        @error('nama_merk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Category Merk --}}
    <div class="form-group mb-3">
        <b><label>Category</label></b>
        @foreach ($category as $item)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="category[]" value="{{ $item->id }}" id="{{ $item->name }}">
                <label class="form-check-label" for="{{ $item->name }}">
                      {{ $item->name }}
                </label>
            </div>
        @endforeach
        @error('category')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambah +</button>
    </form>
@endsection
