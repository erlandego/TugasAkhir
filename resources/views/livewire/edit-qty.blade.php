<tr @if($hapus == true) style="visibility: collapse;" @endif>
    <td class="align-middle"><img src="{{ asset('storage/' . $gambar) }}" alt="" style="width: 50px;"></td>
    <td class="align-middle"> {{ $namabarang }} </td>
    <td class="align-middle">Rp{{ number_format($harga) }}</td>
    <td class="align-middle">
        <div class="input-group quantity mx-auto" style="width: 100px;">
            <div class="input-group-btn">
                <button wire:click='kurang' class="btn btn-sm btn-primary btn-minus">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
            <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $qty }}" disabled>
            <div class="input-group-btn">
                <button wire:click='tambah' class="btn btn-sm btn-primary btn-plus">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
    </td>
    <td class="align-middle">Rp{{ number_format($total) }}</td>
    <td wire:click="hapus" class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
</tr>

