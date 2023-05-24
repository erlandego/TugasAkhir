<div>
    <b><label for="image">Upload Gambar :</label></b>
    @if(isset($images))
        <div class="containercard">
        @foreach ($images as $item)
            <div class="card mb-3 m-4" style="width: 10rem; float:left;">
                <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->image }}">
                <div class="card-body" style="padding:5px">
                    <div class="isiancard" style="float: left;">
                        <button class="btn btn-danger btn-sm" wire:click.prevent="hapusgambar({{ $item->id }})" style="width:100%;">Delete</button>
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
