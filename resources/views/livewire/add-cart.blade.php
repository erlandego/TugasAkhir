<div>
    @php
        if(isset($tes)){
            if($tes == true){
                echo "<script>alert('Barang ditambahkan ke cart')</script>";
            }
        }
    @endphp
    <button wire:click='addtocart' class="btn btn-success"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
</div>
