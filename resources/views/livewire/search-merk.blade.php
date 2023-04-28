<div>
    <input id="merk2" name="merk2" type="text" class="form-control" wire:model="search" Placeholder="Merk barang..."/>

    @if(isset($search))
        <ul class="list-group" id="ulmerk">
        @if($search == '' || $search == null)
            <li class="list-group-item">No Result...</li>
        @elseif(count($merks) == 0)
            <li class="list-group-item">No Result...</li>
        @else
            @foreach($merks as $merk)
                <li class="list-group-item" style="cursor: pointer;" id="merk{{ $merk->id }}" onclick="listgroupclick('merk{{ $merk->id }}')">{{ $merk->nama_merk }}</li>
            @endforeach
        @endif
        </ul>
    @endif

    <input type="hidden" name="merkpilihan" class="form-control" id="merkpilihan">
</div>
