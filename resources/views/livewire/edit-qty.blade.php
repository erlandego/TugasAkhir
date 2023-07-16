<div>
    <div class="input-group quantity mx-auto" style="width: 100px;">
        <div class="input-group-btn">
            <button wire:click='kurang' class="btn btn-sm btn-primary btn-minus">
                <i class="fa fa-minus"></i>
            </button>
        </div>
        <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $qty }}" disabled>
        {{-- <input type="text" class="totalhidden" value="{{ number_format($total) }}"> --}}
        <div class="input-group-btn">
            <button wire:click='tambah' class="btn btn-sm btn-primary btn-plus">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>

