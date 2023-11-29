<div>
<div id="popup" class="popup" @if($hide == true) style="display:none;" @endif>
    <div class="content">
        <div onclick="tutuppopup()" class="closebut"><i class="fa fa-x"></i></div>
        {{-- Untuk Komponen --}}
        @if($bantuan == false)
        @if ($indikator == "processor")
        @foreach ($proc as $item)
        <div class="popup-content" @if($item->power == null) wire:click='hide(0)' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('processor' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , '{{ $item->Socket->id }}' , null , null , null , null , null , {{ $item->harga }} , {{ $item->berat }} , {{ $item->power }})">
            @foreach ($image as $item2)
                @if ($item2->barang_id == $item->id)
                    <img src="{{ asset('storage/'.$item2->image) }}" alt="" style="width: 100px;">
                    @break
                @endif
            @endforeach
            <h6 class="mt-2">{{ $item->nama_barang }}</h6>
            <b>Rp{{ number_format($item->harga) }}</b>

        </div>
        @endforeach
        @endif

        @if ($indikator == "motherboard")
        @foreach ($motherboard as $item)
        <div class="popup-content" @if($item->power == null) wire:click='hide(0 , "{{ $indikator }}")' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('motherboard' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }} , {{ $item->berat }} , {{ $item->power }})">
            @foreach ($image as $item2)
                @if ($item2->barang_id == $item->id)
                    <img src="{{ asset('storage/'.$item2->image) }}" alt="" style="width: 100px;">
                    @break
                @endif
            @endforeach
            <h6 class="mt-2">{{ $item->nama_barang }}</h6>
            <b>Rp{{ number_format($item->harga) }}</b>
        </div>
        @endforeach
        @endif

        @if ($indikator == "ram")
        @foreach ($ram as $item)
        <div class="popup-content" @if($item->power == null) wire:click='hide(0 , "{{ $indikator }}")' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('ram' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }} , {{ $item->berat }} , {{ $item->power }})">
            @foreach ($image as $item2)
                @if ($item2->barang_id == $item->id)
                    <img src="{{ asset('storage/'.$item2->image) }}" alt="" style="width: 100px;">
                    @break
                @endif
            @endforeach
            <h6 class="mt-2">{{ $item->nama_barang }}</h6>
            <b>Rp{{ number_format($item->harga) }}</b>
        </div>
        @endforeach
        @endif

        @if ($indikator == "vga")
        @foreach ($vga as $item)
        <div class="popup-content" @if($item->power == null) wire:click='hide(0 , "{{ $indikator }}")' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('vga' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }} , {{ $item->berat }} , {{ $item->power }})">
            @foreach ($image as $item2)
                @if ($item2->barang_id == $item->id)
                    <img src="{{ asset('storage/'.$item2->image) }}" alt="" style="width: 100px;">
                    @break
                @endif
            @endforeach
            <h6 class="mt-2">{{ $item->nama_barang }}</h6>
            <b>Rp{{ number_format($item->harga) }}</b>
        </div>
        @endforeach
        @endif

        @if ($indikator == "fan")
        @foreach ($fan as $item)
        <div class="popup-content" @if($item->power == null) wire:click='hide(0 , "{{ $indikator }}")' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('fan' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }} , {{ $item->berat }} , {{ $item->power }})">
            @foreach ($image as $item2)
                @if ($item2->barang_id == $item->id)
                    <img src="{{ asset('storage/'.$item2->image) }}" alt="" style="width: 100px;">
                    @break
                @endif
            @endforeach
            <h6 class="mt-2">{{ $item->nama_barang }}</h6>
            <b>Rp{{ number_format($item->harga) }}</b>
        </div>
        @endforeach
        @endif

        @if ($indikator == "case")
        @foreach ($case as $item)
        <div class="popup-content" @if($item->power == null) wire:click='hide(0 , "{{ $indikator }}")' @else wire:click='hide({{ $item->power }} , "{{ $indikator }}")' @endif onclick="pilih('case' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }} , {{ $item->berat }} , {{ $item->power }})">
            @foreach ($image as $item2)
                @if ($item2->barang_id == $item->id)
                    <img src="{{ asset('storage/'.$item2->image) }}" alt="" style="width: 100px;">
                    @break
                @endif
            @endforeach
            <h6 class="mt-2">{{ $item->nama_barang }}</h6>
            <b>Rp{{ number_format($item->harga) }}</b>
        </div>
        @endforeach
        @endif

        @if ($indikator == "psu")
        @foreach ($psu as $item)
        <div class="popup-content" wire:click='hide(0 , "{{ $indikator }}")' onclick="pilih('psu' , '{{ $item->nama_barang }}' , '{{ $item->id }}' , null , '{{ $item->slot_id }}' , '{{ $item->size_id }}' , '{{ $item->dimm }}' , '{{ $item->m2 }}' , '{{ $item->nvme }}' , {{ $item->harga }} , {{ $item->berat }} , {{ $item->power }})">
            @foreach ($image as $item2)
                @if ($item2->barang_id == $item->id)
                    <img src="{{ asset('storage/'.$item2->image) }}" alt="" style="width: 100px;">
                    @break
                @endif
            @endforeach
            <h6 class="mt-2">{{ $item->nama_barang }}</h6>
            <b>Rp{{ number_format($item->harga) }}</b>
        </div>
        @endforeach
        @endif
        {{-- Untuk Bantuan --}}
        @else
        @if($indikator == "processor")
            <iframe width="1000px" height="435px" src="https://www.youtube.com/embed/LTEMCmskkiA?si=PWAfvTxYrKOcciTQ">
            </iframe>
        @endif
        @if($indikator == "motherboard")
            <iframe width="1000px" height="435px" src="https://www.youtube.com/embed/LllMY8PIvsg?si=qb5rd2Bl5qch7_0p">
            </iframe>
        @endif
        @if($indikator == "ram")
            <iframe width="1000px" height="435px" src="https://www.youtube.com/embed/YRpg-ksoksE?si=pX-sHS0q1CC5fo6Z">
            </iframe>
        @endif
        @if($indikator == "vga")
            <iframe width="1000px" height="435px" src="https://www.youtube.com/embed/6nf3hKK8-kM?si=axJkwFU_OwOt-Smj">
            </iframe>
        @endif
        @if($indikator == "fan")
            <iframe width="1000px" height="435px" src="https://www.youtube.com/embed/fMCJ2B6TlWM?si=6-Wj7nZX0bXRh4io">
            </iframe>
        @endif
        @if($indikator == "case")
            <iframe width="1000px" height="435px" src="https://www.youtube.com/embed/jnBL3Kg1txM?si=CP0h5ZFkjGL1Qq8D">
            </iframe>
        @endif
        @if($indikator == "psu")
            <iframe width="1000px" height="435px" src="https://www.youtube.com/embed/zOUlUXJyWSk?si=C968KQOGbmhocV">
            </iframe>
        @endif
        @endif
    </div>
</div>

<form class="m-4" method="post" action="/tambahrakitan">
@csrf

    <div class="form-group mb-5">
        <b><label for="nama_rakitan">Nama Rakitan : </label></b>
        <input type="text" name="nama_rakitan" class="form-control" id="namarakitan">
    </div>

    <div class="form-group mb-5">
        <input type="text" name="processor" class="form-control d-inline" id="processor" placeholder="Processor" style="width: 80%;" readonly>
        <input type="hidden" name="processorID" class="form-control" id="processorID" wire:model='processor'>
        <input type="hidden" name="socket" class="form-control" id="socket" wire:model='socket'>
        <input type="hidden" name="processorPrice" class="form-control" id="processorPrice" wire:model="processorPrice">
        <input type="hidden" name="processorweight" class="form-control" id="processorweight" wire:model="processorweight">
        <button type="button" class="btn btn-primary d-inline" onclick="popup()" wire:click='processor'> Pilih Processor </button>
        <div class="tooltipku" wire:click="bantuan('processor')">
            <i class="fa fa-question-circle"></i>
            <div class="tooltiptextku"><span class="tooltiptext">Apa itu Processor ?</span></div>
        </div>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="motherboard" class="form-control d-inline" id="motherboard" placeholder="Motherboard" style="width: 80%" readonly>
        <input type="hidden" name="motherboardID" class="form-control" id="motherboardID" wire:model="motherboardID">
        <input type="hidden" name="motherboardPrice" class="form-control" id="motherboardPrice" wire:model="motherboardPrice">
        <input type="hidden" name="motherboardweight" class="form-control" id="motherboardweight" wire:model="motherboardweight">
        <input type="hidden" name="slot" class="form-control" id="slot" wire:model="slot">
        <input type="hidden" name="size" class="form-control" id="size" wire:model="size">
        <input type="hidden" name="dimm" class="form-control" id="dimm" wire:model="dimm">
        <input type="hidden" name="m2" class="form-control" id="m2" wire:model="m2">
        <input type="hidden" name="nvme" class="form-control" id="nvme" wire:model="nvme">
        <button type="button" class="btn btn-primary d-inline" onclick="popup()" wire:click="motherboard"> Pilih Motherboard </button>
        <div class="tooltipku" wire:click="bantuan('motherboard')">
            <i class="fa fa-question-circle"></i>
            <div class="tooltiptextku"><span class="tooltiptext">Apa itu Motherboard ?</span></div>
        </div>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="ram" class="form-control d-inline" id="ram" placeholder="RAM" style="width: 70%" readonly>
        <input type="hidden" name="ramID" id="ramID" class=form-control wire:model="ramID">
        <input type="hidden" name="ramPrice" id="ramPrice" class=form-control wire:model="ramPrice">
        <input type="hidden" name="ramweight" id="ramweight" class=form-control wire:model="ramweight">
        <input type="hidden" name="ramQty" id="ramQty" class="form-control" value="{{ $ramQty }}">
        <select class="form-control d-inline" wire:model="ramQty" id="jumlahram" name="jumlahram" style="width: 10%">
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
        <button type="button" class="btn btn-primary d-inline" onclick="popup()" wire:click="ram"> Pilih RAM </button>
        <div class="tooltipku" wire:click="bantuan('ram')">
            <i class="fa fa-question-circle"></i>
            <div class="tooltiptextku"><span class="tooltiptext">Apa itu RAM ?</span></div>
        </div>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="vga" class="form-control d-inline" id="vga" placeholder="VGA" style="width: 80%;" readonly>
        <input type="hidden" name="vgaID" class="form-control" id="vgaID" wire:model="vgaID" readonly>
        <input type="hidden" name="vgaPrice" class="form-control" id="vgaPrice" wire:model="vgaPrice" readonly>
        <input type="hidden" name="vgaweight" class="form-control" id="vgaweight" wire:model="vgaweight" readonly>
        <button type="button" class="btn btn-primary d-inline" onclick="popup()" wire:click="vga"> Pilih VGA </button>
        <div class="tooltipku" wire:click="bantuan('vga')">
            <i class="fa fa-question-circle"></i>
            <div class="tooltiptextku"><span class="tooltiptext">Apa itu VGA Card ?</span></div>
        </div>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="fan" class="form-control d-inline" id="fan" placeholder="Fan Cooler" style="width: 80%" readonly>
        <input type="hidden" name="fanID" class="form-control" id="fanID" wire:model="fanID" readonly>
        <input type="hidden" name="fanPrice" class="form-control" id="fanPrice" wire:model="fanPrice" readonly>
        <input type="hidden" name="fanweight" class="form-control" id="fanweight" wire:model="fanweight" readonly>
        <button type="button" class="btn btn-primary" onclick="popup()" wire:click="fan"> Pilih CPU Cooling </button>
        <div class="tooltipku" wire:click="bantuan('fan')">
            <i class="fa fa-question-circle"></i>
            <div class="tooltiptextku"><span class="tooltiptext">Apa itu CPU Cooling ?</span></div>
        </div>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="case" class="form-control d-inline" id="case" placeholder="Case" style="width: 80%" readonly>
        <input type="hidden" name="caseID" class="form-control" id="caseID" wire:model="caseID" readonly>
        <input type="hidden" name="casePrice" class="form-control" id="casePrice" wire:model="casePrice" readonly>
        <input type="hidden" name="caseweight" class="form-control" id="caseweight" wire:model="caseweight" readonly>
        <button type="button" class="btn btn-primary" onclick="popup()" wire:click="case"> Pilih Case </button>
        <div class="tooltipku">
            <i class="fa fa-question-circle" wire:click="bantuan('case')"></i>
            <div class="tooltiptextku"><span class="tooltiptext">Apa itu Case ?</span></div>
        </div>
    </div>

    <div class="form-group mb-5">
        <input type="text" name="psu" class="form-control d-inline" id="psu" placeholder="Powersupply" style="width: 80%" readonly>
        <input type="hidden" name="psuID" class="form-control" id="psuID" wire:model="psuID">
        <input type="hidden" name="psuPrice" class="form-control" id="psuPrice" wire:model="psuPrice">
        <input type="hidden" name="psuweight" class="form-control" id="psuweight" wire:model="psuweight">
        <button type="button" class="btn btn-primary" onclick="popup()" wire:click="psu"> Pilih Power Supply </button>
        <div class="tooltipku">
            <i class="fa fa-question-circle" wire:click="bantuan('psu')"></i>
            <div class="tooltiptextku"><span class="tooltiptext">Apa itu Powersupply ?</span></div>
        </div>
    </div>

    <input type="text" name="totalharga" class="form-control" id="totalpower" value="{{ $totalharga }}" readonly>
    <input type="text" name="totalberat" class="form-control" id="totalberat" value="{{ $totalberat }}" readonly>

    <input type="submit" class="btn btn-primary mt-5" value="Save" name="save">
    <input type="submit" class="btn btn-primary mt-5" value="Add To Cart" name="cart">
    <input type="text" name="totalpower" class="form-control" id="totalpower" value="{{ $totalpower }}" readonly>
</form>
</div>

