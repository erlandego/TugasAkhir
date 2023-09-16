<div>
@foreach ($alamat as $item)
    @if ($item->user_id == $iduser)
        <div class="card m-5">
            <div class="card-header @if($item->utama == 1) {{ "text-white bg-success" }} @endif">
                {{ $item->nama }} @if($item->utama == 1) <i>{{ "(Alamat Utama)" }}</i> @endif
            </div>
            <div class="card-body @if($item->utama == 1) {{ "text-dark" }} @endif" @if($item->utama == 1)  style="background-color:#D4EDDA" @endif>
                <h5 class="card-title @if($item->utama == 1) {{ "text-dark" }} @endif">{{ $item->alamat }}</h5>
                <p class="card-text">{{ $item->Provinsi->nama_provinsi }} <br>
                    {{ $item->City->city_name }} <br>
                    {{ $item->Kecamatan->subdistrict_name }}
                </p>
                <div class="button-group">
                    @if($item->utama == 0)
                        <button class="btn btn-primary" wire:click='utama({{ $item->id }})'>Jadikan Alamat Utama</button>
                    @endif
                    <form action="/alamat/{{ $item->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger ml-2" onclick="return confirm('Apakah yakin ingin menghapus ?')">Delete</button>
                        <a href="/alamat/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endforeach
</div>
