<div>
    <div class="rekomendasi">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="storage/rekomendasi-images/gaming.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Gaming</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <button wire:click='pilih("gaming")' class="btn btn-primary">Go somewhere</button>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('storage/rekomendasi-images/school.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">School</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <button wire:click='pilih("school")' class="btn btn-primary">Go somewhere</button>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('storage/rekomendasi-images/home-office.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Home Office</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <button wire:click='pilih("home-office")' class="btn btn-primary">Go somewhere</button>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('storage/rekomendasi-images/design.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Design</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <button wire:click='pilih("design")' class="btn btn-primary">Go somewhere</button>
            </div>
        </div>
    </div>

    <div class="rekomendasi" @if($pilihrekomendasi == false) style="display:none;" @endif>
        @if($rekomendasi == "gaming")
            @foreach ($paketgaming as $item)
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item }}</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        @elseif($rekomendasi == "school")
            @foreach ($paketschool as $item)
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item }}</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        @elseif($rekomendasi == "home-office")
            @foreach ($pakethome as $item)
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item }}</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        @elseif($rekomendasi == "design")
            @foreach ($paketdesign as $item)
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item }}</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
