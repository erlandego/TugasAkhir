<div>
    <div class="form-group ml-5 mt-2">
        <b><label for="provinsi_id">Provinsi</label></b>
        <select class="form-control" id="provinsi_id" name="provinsi_id" wire:model="provinsi">
            <option selected value> -- Pilih Provinsi -- </option>
            @foreach ($listprovinsi as $item)
                <option value="{{ $item->id }}">{{ $item->nama_provinsi }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group ml-5 mt-2">
        <b><label for="city_id">City</label></b>
        <select class="form-control" id="city_id" name="city_id" wire:model="kabupaten">
            <option selected value> -- Pilih Kabupaten/Kota -- </option>
            @if($listkabupaten != null)
                @if($checkkab == true)
                    @foreach ($listkabupaten as $item)
                        @if($item->id == $kabupaten){
                            <option value="{{ $item->id }}" selected>@if($item->type == "Kota") {{ "Kota" }} @else {{ "Kabupaten " }}  @endif{{ $item->city_name }}</option>
                        }
                        @else
                            <option value="{{ $item->id }}"> @if($item->type == "Kota") {{ "Kota " }} @else {{ "Kabupaten " }}  @endif {{ $item->city_name }}</option>
                        @endif
                    @endforeach
                @else
                    @foreach ($listkabupaten as $item)
                        <option value="{{ $item->id }}">@if($item->type == "Kota") {{ "Kota " }} @else {{ "Kabupaten " }}  @endif {{ $item->city_name }}</option>
                    @endforeach
                @endif
            @endif
        </select>
    </div>

    <div class="form-group ml-5 mt-2">
        <b><label for="kecamatan_id">Kecamatan</label></b>
        <select class="form-control" id="kecamatan_id" name="kecamatan_id">
            <option disabled selected value> -- Pilih Kecamatan -- </option>
            @if($listkecamatan != null)
                @foreach ($listkecamatan as $item)
                    <option value="{{ $item->id }}">{{ $item->subdistrict_name }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
