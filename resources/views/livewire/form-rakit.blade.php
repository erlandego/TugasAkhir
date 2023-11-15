<div>
<div id="popup" class="popup" @if($hide == true) style="display:none;" @endif>
    @if ($indikator == "processor")
        @foreach ($proc as $item)
        <div class="popup-content" @if($item->power == null) wire:click='hide(0)' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('processor' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , '{{ $item->Socket->id }}' , null , null , null , null , null , {{ $item->harga }})">
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
        <div class="popup-content" @if($item->power == null) wire:click='hide(0 , "{{ $indikator }}")' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('motherboard' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }})">
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
        <div class="popup-content" @if($item->power == null) wire:click='hide(0 , "{{ $indikator }}")' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('ram' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }})">
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
        <div class="popup-content" @if($item->power == null) wire:click='hide(0 , "{{ $indikator }}")' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('vga' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }})">
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
        <div class="popup-content" @if($item->power == null) wire:click='hide(0 , "{{ $indikator }}")' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('fan' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }})">
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
        <div class="popup-content" @if($item->power == null) wire:click='hide(0 , "{{ $indikator }}")' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('case' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }})">
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

    @if ($indikator == "psu")
        @foreach ($psu as $item)
        <div class="popup-content" wire:click='hide(0 , "{{ $indikator }}")' onclick="pilih('psu' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }})">
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

<form class="m-4" method="post" action="/tambahrakitan">
@csrf

    <div class="form-group mb-5">
        <b><label for="nama_rakitan">Nama Rakitan : </label></b>
        <input type="text" name="nama_rakitan" class="form-control" id="namarakitan">
    </div>

    <div class="form-group mb-5">
        <input type="text" name="processor" class="form-control" id="processor" placeholder="Processor" readonly>
        <input type="hidden" name="processorID" class="form-control" id="processorID" wire:model='processor'>
        <input type="hidden" name="socket" class="form-control" id="socket" wire:model='socket'>
        <input type="hidden" name="processorPrice" class="form-control" id="processorPrice" wire:model="processorPrice">
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click='processor'> Pilih Processor </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="motherboard" class="form-control" id="motherboard" placeholder="Motherboard" readonly>
        <input type="hidden" name="motherboardID" class="form-control" id="motherboardID" wire:model="motherboardID">
        <input type="hidden" name="motherboardPrice" class="form-control" id="motherboardPrice" wire:model="motherboardPrice">
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
            <input type="hidden" name="ramPrice" id="ramPrice" class=form-control wire:model="ramPrice">
            <input type="hidden" name="ramQty" id="ramQty" class="form-control" value="{{ $ramQty }}">
        </div>
        <div class="input-group-append">
            <select class="form-control" wire:model="ramQty" id="jumlahram" name="jumlahram">
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
        <input type="hidden" name="vgaID" class="form-control" id="vgaID" wire:model="vgaID" readonly>
        <input type="hidden" name="vgaPrice" class="form-control" id="vgaPrice" wire:model="vgaPrice" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="vga"> Pilih VGA </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="fan" class="form-control" id="fan" placeholder="Fan Cooler" readonly>
        <input type="hidden" name="fanID" class="form-control" id="fanID" wire:model="fanID" readonly>
        <input type="hidden" name="fanPrice" class="form-control" id="fanPrice" wire:model="fanPrice" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="fan"> Pilih Fan Cooling </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="case" class="form-control" id="case" placeholder="Case" readonly>
        <input type="hidden" name="caseID" class="form-control" id="caseID" wire:model="caseID" readonly>
        <input type="hidden" name="casePrice" class="form-control" id="casePrice" wire:model="casePrice" readonly>
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="case"> Pilih Case </button>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="psu" class="form-control" id="psu" placeholder="Powersupply" readonly>
        <input type="hidden" name="psuID" class="form-control" id="psuID" wire:model="psuID">
        <input type="hidden" name="psuPrice" class="form-control" id="psuPrice" wire:model="psuPrice">
        <button type="button" class="btn btn-primary mt-2" onclick="popup()" wire:click="psu"> Pilih Power Supply </button>
    </div>

    <input type="text" name="totalharga" class="form-control" id="totalpower" value="{{ $totalharga }}" readonly>

    <input type="submit" class="btn btn-primary mt-5" value="Save" name="save">
    <input type="submit" class="btn btn-primary mt-5" value="Add To Cart" name="cart">
    <input type="text" name="totalpower" class="form-control" id="totalpower" value="{{ $totalpower }}" readonly>
</form>
</div>

