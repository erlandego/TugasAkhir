<div>
{{-- @if ($processor != null || $processor != "")
    @dd($processor)
@endif --}}
<div id="popup" class="popup">
    @if ($indikator == "processor")
        @foreach ($proc as $item)
        <div class="popup-content" onclick="pilih('processor' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , '{{ $item->Socket->id }}')">
            @foreach ($image as $item2)
                @if ($item2->barang_id == $item->id)
                    <img src="{{ asset('storage/'.$item2->image) }}" alt="" style="width: 100px;">
                    @break
                @endif
            @endforeach
            <h6 class="mt-2">{{ $item->nama_barang }}</h6>
            <b>{{ $item->Merk->nama_merk }}</b>
        </div>
        @endforeach
    @endif


    @if ($indikator == "motherboard")
        @foreach ($proc as $item)
        <div class="popup-content" onclick="pilih('motherboard' , '{{ $item->nama_barang }}')">
            @foreach ($image as $item2)
                @if ($item2->barang_id == $item->id)
                    <img src="{{ asset('storage/'.$item2->image) }}" alt="" style="width: 100px;">
                    @break
                @endif
            @endforeach
            <h6 class="mt-2">{{ $item->nama_barang }}</h6>
            <b>{{ $item->Merk->nama_merk }}</b>
        </div>
        @endforeach
    @endif

</div>

<form class="m-4" method="post" action="#">
@csrf

    <div class="form-group mb-5">
        <input type="text" name="processor" class="form-control" id="processor" placeholder="Processor" readonly>
        <input type="hidden" name="processorID" class="form-control" id="processorID" wire:model='processor'>
        <input type="hidden" name="socket" class="form-control" id="socket" wire:model='socket'>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click='processor'> Pilih Processor </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="motherboard" class="form-control" id="motherboard" placeholder="Motherboard" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="motherboard"> Pilih Motherboard </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="ram" class="form-control" id="ram" placeholder="RAM" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="motherboard"> Pilih RAM </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="vga" class="form-control" id="vga" placeholder="VGA" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="motherboard"> Pilih VGA </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="fan" class="form-control" id="fan" placeholder="Fan Cooler" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="motherboard"> Pilih Fan Cooling </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="fan" class="form-control" id="case" placeholder="Case" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="motherboard"> Pilih Case </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="fan" class="form-control" id="psu" placeholder="Powersupply" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="motherboard"> Pilih Power Supply </button>
    </div>

    <button class="btn btn-primary mt-5">Submit</button>
</form>
</div>

