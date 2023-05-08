<div>
    {{-- @if($berhasil == true)
        <script>alert('Berhasil')</script>
    @endif --}}
    <b><label for="image">Upload Gambar :</label></b>
    @if(isset($images))
        <div class="containercard">
        @foreach ($images as $item)
            <div class="card mb-3 m-4" style="width: 10rem; float:left;">
                <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->image }}">
                <div class="card-body" style="padding:5px">
                    <div class="isiancard" style="float: left;">
                        <a class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @endif

    <input class="form-control" type="file" id="formFile" name='image' wire:model='image'>
    <small id="imageHelp" class="form-text text-muted">Upload file dalam bentuk jpg atau png.</small><br>
    @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
