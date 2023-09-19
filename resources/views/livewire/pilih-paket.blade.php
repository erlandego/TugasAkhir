
    <div class="col-lg-4">
        <div class="card border-secondary mb-5">
            <div class="card-header bg-secondary border-0">
                <h4 class="font-weight-semi-bold m-0">Paket Pengiriman</h4>
            </div>
            <div class="card-body">
                        @if($response != null)
                            @foreach ($response->rajaongkir->results[0]->costs as $item)
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="radiopaket" id="{{ $item->service }}" value="{{ $item->cost[0]->value }}" wire:click="requlang('{{ $response->rajaongkir->query->destination }}','{{ $response->rajaongkir->query->weight }}','{{ $response->rajaongkir->query->courier }}')" wire:model="paket">
                                    <label class="form-check-label" for="{{ $item->service }}">
                                        <h5>{{ $item->service }}</h5>
                                        {{ $item->description }} <br>
                                        Rp{{ number_format($item->cost[0]->value) }} <br>
                                        {{ $item->cost[0]->etd }} hari <br>

                                    </label>
                                </div>
                            @endforeach
                        @else
                            -
                        @endif
            </div>
        </div>
    </div>

