<div>
@php
    $totalpower = 0;
@endphp
<div id="popup" class="popup" @if($hide == true) style="display:none;" @endif>
    @if ($indikator == "processor")
        @foreach ($proc as $item)
        <div class="popup-content" wire:click='hide({{ $item->power }})' onclick="pilih('processor' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , '{{ $item->Socket->id }}' , null , null , null , null , null)">
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
        @foreach ($motherboard as $item)
        <div class="popup-content" wire:click='hide({{ $item->power }})' onclick="pilih('motherboard' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}')">
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

    @if ($indikator == "ram")
        @foreach ($ram as $item)
        <div class="popup-content" wire:click='hide({{ $item->power }})' onclick="pilih('ram' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}')">
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

    @if ($indikator == "vga")
        @foreach ($vga as $item)
        <div class="popup-content" wire:click='hide({{ $item->power }})' onclick="pilih('vga' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}')">
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

    @if ($indikator == "fan")
        @foreach ($fan as $item)
        <div class="popup-content" wire:click='hide({{ $item->power }})' onclick="pilih('fan' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}')">
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

    @if ($indikator == "case")
        @foreach ($case as $item)
        <div class="popup-content" wire:click='hide({{ $item->power }})' onclick="pilih('case' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}')">
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
        <input type="hidden" name="motherboardID" class="form-control" id="motherboardID" wire:model="motherboardID">
        <input type="hidden" name="slot" class="form-control" id="slot" wire:model="slot">
        <input type="hidden" name="size" class="form-control" id="size" wire:model="size">
        <input type="hidden" name="dimm" class="form-control" id="dimm" wire:model="dimm">
        <input type="hidden" name="m2" class="form-control" id="m2" wire:model="m2">
        <input type="hidden" name="nvme" class="form-control" id="nvme" wire:model="nvme">
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="motherboard"> Pilih Motherboard </button>
    </div>

    <div class="form-group mb-5">
        <div class="input-group-append">
            <input type="text" name="ram" class="form-control" id="ram" placeholder="RAM" readonly>
            <input type="hidden" name="ramID" id="ramID" class=form-control wire:model="ramID">
        </div>
        <div class="input-group-append">
            <select class="form-control" id="jumlahram" name="jumlahram">
                @if (isset($dimm))
                    @for($i = 0; $i < $dimm; $i++)
                        @if ($i == 0)
                            <option selected>{{ $i+1 }}</option>
                        @else
                            <option>{{ $i+1 }}</option>
                        @endif
                    @endfor
                @endif
            </select>
        </div>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="ram"> Pilih RAM </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="vga" class="form-control" id="vga" placeholder="VGA" readonly>
        <input type="hidden" name="vgaID" class="form-control" id="vgaID" placeholder="VGA" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="vga"> Pilih VGA </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="fan" class="form-control" id="fan" placeholder="Fan Cooler" readonly>
        <input type="hidden" name="fanID" class="form-control" id="fanID" wire:model="fanID" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="fan"> Pilih Fan Cooling </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="fan" class="form-control" id="case" placeholder="Case" readonly>
        <input type="hidden" name="fanID" class="form-control" id="caseID" wire:model="caseID" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="case"> Pilih Case </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="psu" class="form-control" id="psu" placeholder="Powersupply" readonly>
        <input type="hidden" name="psuID" class="form-control" id="psuID" wire:model="psuID">
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="psu"> Pilih Power Supply </button>
    </div>

    <input type="hidden" name="totalpower" id="totalpower" wire:model="totalpower">
    <button class="btn btn-primary mt-5">Submit</button>
</form>
</div>

