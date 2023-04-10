@extends('dashboard.layout.dashboard')

@section('container')
    <h2>Ini halaman create</h2>

    <form method="post" action="/dashboard/barang">
        @csrf
        {{-- Nama Barang --}}
        <div class="form-group mt-2 mb-3">
          <b><label for="nama_barang">Nama Barang </label></b>
          <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old("nama_barang") }}" placeholder="Masukkan nama barang" autofocus>
          @error('nama_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
          <input type="hidden" class="form-control" id="slug" name="slug">
        </div>
        {{-- Kategori --}}
        <div class="form-group mb-3">
          <b><label for="category_id">Kategori</label></b>
          <select class="form-control" id="category_id" value="{{ old('category_id') }}" name="category_id" onchange="muncul()">
            @foreach ($barangs as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        {{-- Merk --}}
        <div class="form-group mb-3" id="divmerk">
            <b><label for="merk">Merk</label></b>
            <select class="form-control" id="merk" name="merk">
                @foreach ($merkPro as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_merk }}</option>
                @endforeach
            </select>
        </div>
        {{-- Size --}}
        <div class="form-group mb-3" id="divsize">
            <b><label for="size">Ukuran Case</label></b>
            <select class="form-control" id="size" name="size">
                <option value="1">ATX</option>
                <option value="2">Mini ITX</option>
                <option value="3">Micro ATX</option>
                <option value="4">EATX</option>
                <option value="5">Nano ITX</option>
                <option value="6">Pico ITX</option>
            </select>
        </div>
        {{-- DDR --}}
        <div class="form-group mb-3" id="divddr">
            <b><label for="ddr">DDR</label></b>
            <select class="form-control" id="ddr" name="ddr">
                <option value="1">DDR1</option>
                <option value="2">DDR2</option>
                <option value="3">DDR3</option>
                <option value="4">DDR4</option>
            </select>
        </div>
        {{-- Socket --}}
        <div class="form-group mb-3" id="divsocket">
            <b><label for="socket">Socket</label></b>
            <select class="form-control" id="socket" name="socket">
                <option value="1">DDR1</option>
                <option value="2">DDR2</option>
                <option value="3">DDR3</option>
                <option value="4">DDR4</option>
            </select>
        </div>
        {{-- Harga Barang --}}
        <div class="form-group mb-3">
            <b><label for="harga">Harga Barang</label></b>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                </div>
                <input id="harga" type="number" value="{{ old('harga') }}" class="form-control" aria-label="Small" name="harga" required>
            </div>
        </div>
        {{-- Deskripsi barang --}}
        @error('deskripsi')
            <p class="text-danger"> {{ $message }} </p>
        @enderror
        <div class="form-group mb-3">
            <b><label for="deskripsi">Deskripsi barang</label></b>
            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" value="{{ old('deskripsi') }}"></textarea>
          </div>
        {{-- btn submit --}}
        <button type="submit" class="btn btn-primary">Tambah+</button>
    </form>

    <script>
        const nama = document.querySelector('#nama_barang');
        const slug = document.querySelector('#slug');
        const kategori = document.querySelector('#category_id');
        const merk = document.querySelector('#merk');

        document.getElementById("divsize").style.display = "none";
        document.getElementById("divddr").style.display = "none";

        function muncul(){
            var namakategori = kategori.options[kategori.selectedIndex].text;
            var idcat = kategori.value;
            if(namakategori == "Casing"){
                document.getElementById("divsize").style.display = "";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "none"
                document.getElementById("divddr").style.display = "none";
            }
            else if(namakategori == "Processor"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = ""
                document.getElementById("divddr").style.display = "none";
            }
            else if(namakategori == "RAM"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "none"
                document.getElementById("divddr").style.display = "";
            }
            else if(namakategori == "VGA Card"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "none"
                document.getElementById("divddr").style.display = "";
            }
            else{
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "none"
                document.getElementById("divddr").style.display = "none";
            }

            if(idcat == 1){
                document.getElementById('merk').innerHTML = "";
                document.getElementById('merk').innerHTML = "@foreach($merkPro as $item) <option value='{{ $item->id }}'>{{ $item->nama_merk }}</option>  @endforeach";
            }
            else{
                document.getElementById('merk').innerHTML = "";
                document.getElementById('merk').innerHTML = "@foreach($merkOth as $item) <option value='{{ $item->id }}'>{{ $item->nama_merk }}</option> @endforeach";
            }
        }


        // function string_to_slug (str) {
        //     str = str.replace(/^\s+|\s+$/g, ''); // trim
        //     str = str.toLowerCase();

        //     // remove accents, swap ñ for n, etc
        //     var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        //     var to   = "aaaaeeeeiiiioooouuuunc------";
        //     for (var i=0, l=from.length ; i<l ; i++) {
        //         str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        //     }

        //     str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        //         .replace(/\s+/g, '-') // collapse whitespace and replace by -
        //         .replace(/-+/g, '-'); // collapse dashes

        //     return str;
        // }

        // function isislug(slugz){
        //     slug.value = slugz;
        // }

        // nama.addEventListener("change" , function(){
        //     isislug(string_to_slug(nama.value));
        // });

        nama.addEventListener('change' , function(){
            fetch('/dashboard/barang/checkSlug?nama=' + nama.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

    </script>
@endsection
