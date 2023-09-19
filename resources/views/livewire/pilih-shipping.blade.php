<div class="col-lg-4">
    <div class="card border-secondary mb-5">
        <div class="card-header bg-secondary border-0">
            <h4 class="font-weight-semi-bold m-0">Shipping</h4>
        </div>
        <div class="card-body">

            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="radioshipping" id="jne" value="jne" wire:model="shipping">
                <label class="form-check-label" for="jne">
                  <img src='img/Shipping/jne.png' width='100px' height="auto">
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="radioshipping" id="tiki" value="tiki" wire:model="shipping">
                <label class="form-check-label" for="tiki">
                  <img src='img/Shipping/tiki.png' width='110px' height="auto">
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="radioshipping" id="pos" value="pos" wire:model="shipping">
                <label class="form-check-label" for="pos">
                  <img src='img/Shipping/pos.png' width='100px' height="auto">
                </label>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

        </div>

    </div>
</div>

