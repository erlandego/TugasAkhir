<div>
    @php
        $count = 0;
    @endphp
    <input id="barang2" name="barang2" type="text" class="form-control" wire:keydown="diclick" wire:model="search" Placeholder="Barang..."/>
    @if(isset($search))
        <ul class="list-group" id="ulmerk" @if($checker == true) {{ "style=display:none" }} @endif>
        @if($search == '' || $search == null)
            <li class="list-group-item">No Result...</li>
        @elseif(count($barangs) == 0)
            <li class="list-group-item">No Result...</li>
        @else
            @foreach($barangs as $barang)
                <li class="list-group-item" style="cursor: pointer;" id="barang{{ $barang->id }}" onclick="listgroupclick('barang{{ $barang->id }}')">{{ $barang->nama_barang }}</li>
            @endforeach
        @endif
        </ul>
    @endif

    <input type="hidden" name="barangpilihan" class="form-control" id="barangpilihan">
</div>
