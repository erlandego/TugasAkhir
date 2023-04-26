<div>
    <input id="merk2" name="merk2" type="text" class="form-control" wire:model="search" Placeholder="Merk barang..."/>

    @if(isset($search))
        <ul class="list-group">
        @if($search == '' || $search == null)
            <a class="list-group-item">No Result</a>
        @elseif(count($merks) == 0)
            <a class="list-group-item">No Result</a>
        @else
            @foreach($merks as $merk)
                <a class="list-group-item" id="merk{{ $merk->id }}" onclick="listgroupclick('merk{{ $merk->id }}')">{{ $merk->nama_merk }}</a>
            @endforeach
        @endif
        </ul>
    @endif
</div>
