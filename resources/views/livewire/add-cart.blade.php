<div>
    {{-- @php
        if(isset($tes)){
            if($tes == true){
                echo "<script>alert('Barang ditambahkan ke cart')</script>";
            }
        }
    @endphp --}}
    <button onclick="munculkan()" wire:click='addtocart' class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
</div>
