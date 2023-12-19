@extends('dashboard.layout.dashboard')

@section('container')
    {{-- @dd($merkPro) --}}
    <h2>Tambah Barang</h2>

    <form method="post" action="/dashboard/barang" enctype="multipart/form-data">
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
            <div class="input-group input-group-sm mb-3">
                <select class="form-control" id="merk" name="merk_id" onchange="ubahMerk()">
                    @foreach ($merkPro as $item)
                        <option value="{{ $item->Merk->id }}">{{ $item->Merk->nama_merk }}</option>
                    @endforeach
                </select>
                {{-- <div class="input-group-prepend">
                    <button type="button" class="btn btn-primary" id="addnewmerk" onclick="addmerk()">Tambahkan Merk baru</button>
                </div> --}}
            </div>
        </div>

        {{-- Merk 2 --}}
        <div class="form-group mb-3" id="divmerk2">
            <b><label for="merk2">Merk</label></b>
            @livewire('search-merk' , ['barang' => null , 'checker' => false])
        </div>

        {{-- Tambah Merk --}}
        {{-- <div class="form-group mb-3" id="divmerkbaru">
            <b><label for="merkbaru">Tambah Merk baru</label></b>
            <input type="text" class="form-control" id="merkbaru" name="merkbaru">
            <select class="form-control" id="merkcategory" name="merkcategory">
                @foreach ($barangs as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-primary" onclick="tambahmerk()">Tambah</button>
        </div> --}}

        {{-- Size --}}
        <div class="form-group mb-3" id="divsize">
            <b><label for="size">Ukuran Case</label></b>
            <select class="form-control" id="size" name="size">
                @foreach ($listsize as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_ukuran }}</option>
                @endforeach
            </select>
        </div>

        {{-- DDR --}}
        <div class="form-group mb-3" id="divddr">
            <b><label for="ddr">DDR</label></b>
            <select class="form-control" id="ddr" name="ddr">
                @foreach ($listslot as $item)
                    <option value="{{ $item->id }}">{{ $item->ddr }}</option>
                @endforeach
            </select>
        </div>

        {{-- Socket --}}
        <div class="form-group mb-3" id="divsocket">
            <b><label for="socket">Socket</label></b>
            <div class="input-group input-group-sm mb-3">
                <select class="form-control" id="socket" name="socket" onchange="ubahmerk()">

                </select>
                {{-- <div class="input-group-prepend">
                    <button type="button" class="btn btn-primary" id="addnewsocket" onclick="addsocket()">Tambahkan Socket baru</button>
                </div> --}}
            </div>
        </div>

        {{-- Add Socket --}}
        {{-- <div class="form-group mb-3" id="divsocketbaru">
            <b><label for="socketbaru">Input Socket baru : </label></b>
            <input type="text" class="form-control" id="socketbaru" name="socketbaru" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <select class="form-control" id="socketbarumerk" name="socketbarumerk">
                    <option value="1">Intel</option>
                    <option value="2">AMD</option>
                </select>
            </div>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" onclick="tambahsocket()" type="button">Tambah</button>
            </div>
        </div> --}}

        {{-- Power --}}
        <div class="form-group mb-3" id="divpower">
            <b><label for="power">Power :</label></b>
            <div class="input-group input-group-sm mb-3">
                <input id="power" type="number" value="{{ old('power') }}" class="form-control" aria-label="Small" name="power">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Watt</span>
                </div>
            </div>
        </div>

        {{-- NVME --}}
        <div class="form-group mb-3" id="divnvme">
            <b><label for="nvme">Jumlah Slot NVME</label></b>
            <div class="input-group input-group-sm mb-3">
                <input id="nvme" type="number" value="{{ old('nvme') }}" class="form-control" aria-label="Small" name="nvme">
            </div>
        </div>

        {{-- Dimmm --}}
        <div class="form-group mb-3" id="divdimm">
            <b><label for="dimm">Jumlah Slot DIMM</label></b>
            <div class="input-group input-group-sm mb-3">
                <input id="dimm" type="number" value="{{ old('dimm') }}" class="form-control" aria-label="Small" name="dimm">
            </div>
        </div>

        {{-- M.2 --}}
        <div class="form-group mb-3" id="divm2">
            <b><label for="m2">Jumlah Slot M.2</label></b>
            <div class="input-group input-group-sm mb-3">
                <input id="m2" type="number" value="{{ old('m2') }}" class="form-control" aria-label="Small" name="m2">
            </div>
        </div>

        {{-- SATA --}}
        <div class="form-group mb-3" id="divsata">
            <b><label for="sata">Jumlah Slot SATA</label></b>
            <div class="input-group input-group-sm mb-3">
                <input id="sata" type="number" value="{{ old('sata') }}" class="form-control" aria-label="Small" name="sata">
            </div>
        </div>

        {{-- Harga Barang --}}
        <div class="form-group mb-3">
            <b><label for="harga">Harga Jual Barang</label></b>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                </div>
                <input id="harga" type="number" value="{{ old('harga') }}" class="form-control" aria-label="Small" name="harga">
            </div>
        </div>

        {{-- Harga Beli --}}
        <div class="form-group mb-3">
            <b><label for="harga">Harga Beli Barang</label></b>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                </div>
                <input id="harga" type="number" value="{{ old('harga') }}" class="form-control" aria-label="Small" name="harga_beli">
            </div>
        </div>

        {{-- Stok Barang --}}
        <div class="form-group mb-3">
            <b><label for="stok">Input Stok : </label></b>
            <div class="input-group input-group-sm mb-3">
                <input id="stok" type="number" value="{{ old('stok') }}" class="form-control" aria-label="Small" name="stok">
            </div>
        </div>

        {{-- Berat Barang --}}
        <div class="form-group mb-3" id="divberat">
            <b><label for="berat">Berat :</label></b>
            <div class="input-group input-group-sm mb-3">
                <input id="berat" type="number" value="{{ old('berat') }}" class="form-control" aria-label="Small" name="berat">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Kg</span>
                </div>
            </div>
        </div>

        {{-- Rekomendasi --}}
        <div class="form-group mb-3" id="divrekomendasi">
            <b><label for="rekomendasi">Direkomendasikan untuk :</label></b>
            @foreach($rekomendasi as $item)
                <div class="form-check">
                    <input id="rekomendasi" type="checkbox" class="form-check-input" name="rekomendasi[]" value="{{ $item->id }}" id="{{ $item->nama_rekomendasi }}">
                    <label class="form-check-label" for="{{ $item->nama_rekomendasi }}">
                        {{ $item->nama_rekomendasi }}
                    </label>
                </div>
            @endforeach
            @if(session()->has('rekomendasi'))
                <p class="text-danger">{{ session($rekomendasi) }}</p>
            @endif
        </div>

        {{-- upload gambar --}}
        <div class="form-group mb-3" id="divimage">
            @livewire('upload-image' , [
                'dariedit' => false,
                'idbarang' => null
            ])
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
        document.getElementById("divnvme").style.display = "none";
        document.getElementById('divmerk2').style.display = "none";
        document.getElementById('divdimm').style.display = "none";
        document.getElementById('divm2').style.display = "none";
        document.getElementById('divsata').style.display = "none";
        //Karena intel merk pertama yang muncul
        document.getElementById('socket').innerHTML = "@foreach($socketintel as $item)<option value='{{ $item->id }}'>{{ $item->nama_socket }}</option> @endforeach";

        function muncul(){
            var namakategori = kategori.options[kategori.selectedIndex].text;
            var idcat = kategori.value;
            if(namakategori == "Casing"){
                document.getElementById("divsize").style.display = "";
                document.getElementById("divmerk").style.display = "none";
                document.getElementById("divsocket").style.display = "none";
                document.getElementById("divddr").style.display = "none";
                document.getElementById("divpower").style.display = "none";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divmerk2').style.display = "";
                document.getElementById('berat').style.display = "";
                document.getElementById('divimage').style.display = "";
                document.getElementById('divdimm').style.display = "none";
                document.getElementById('divm2').style.display = "none";
                document.getElementById('divsata').style.display = "none";
            }
            else if(namakategori == "Processor"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "";
                document.getElementById("divddr").style.display = "none";
                document.getElementById("divpower").style.display = "";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divmerk2').style.display = "none";
                document.getElementById('berat').style.display = "";
                document.getElementById('divimage').style.display = "";
                document.getElementById('divdimm').style.display = "none";
                document.getElementById('divm2').style.display = "none";
                document.getElementById('divsata').style.display = "none";
            }
            else if(namakategori == "RAM"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "none";
                document.getElementById("divsocket").style.display = "none";
                document.getElementById("divddr").style.display = "";
                document.getElementById("divpower").style.display = "";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divmerk2').style.display = "";
                document.getElementById('berat').style.display = "";
                document.getElementById('divimage').style.display = "";
                document.getElementById('divdimm').style.display = "none";
                document.getElementById('divm2').style.display = "none";
                document.getElementById('divsata').style.display = "none";
            }
            else if(namakategori == "VGA Card"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "none";
                document.getElementById("divsocket").style.display = "none";
                document.getElementById("divddr").style.display = "";
                document.getElementById("divpower").style.display = "";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divmerk2').style.display = "";
                document.getElementById('berat').style.display = "";
                document.getElementById('divimage').style.display = "";
                document.getElementById('divdimm').style.display = "none";
                document.getElementById('divm2').style.display = "none";
                document.getElementById('divsata').style.display = "none";
            }
            else if(namakategori == "Motherboard"){
                document.getElementById("divsize").style.display = "";
                document.getElementById("divmerk").style.display = "none";
                document.getElementById("divsocket").style.display = "";
                document.getElementById("divddr").style.display = "";
                document.getElementById("divpower").style.display = "";
                document.getElementById("divnvme").style.display = "";
                document.getElementById('divmerk2').style.display = "";
                document.getElementById('berat').style.display = "";
                document.getElementById('divimage').style.display = "";
                document.getElementById('divdimm').style.display = "";
                document.getElementById('divm2').style.display = "";
                document.getElementById('divsata').style.display = "";

                document.getElementById('socket').innerHTML = "";
                document.getElementById('socket').innerHTML = "@foreach($listsocket as $item)<option value='{{ $item->id }}'>{{ $item->nama_socket }}</option> @endforeach";
            }
            else if(namakategori == "Power Supply"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "none";
                document.getElementById("divsocket").style.display = "none";
                document.getElementById("divddr").style.display = "none";
                document.getElementById("divpower").style.display = "";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divmerk2').style.display = "";
                document.getElementById('berat').style.display = "";
                document.getElementById('divimage').style.display = "";
                document.getElementById('divdimm').style.display = "none";
                document.getElementById('divm2').style.display = "none";
                document.getElementById('divsata').style.display = "none";
            }
            else{
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "none";
                document.getElementById("divsocket").style.display = "none";
                document.getElementById("divddr").style.display = "none";
                document.getElementById("divpower").style.display = "none";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divmerk2').style.display = "";
                document.getElementById('berat').style.display = "";
                document.getElementById('divimage').style.display = "";
                document.getElementById('divdimm').style.display = "none";
                document.getElementById('divm2').style.display = "none";
                document.getElementById('divsata').style.display = "none";
            }

            //nanti ganti , nd boleh tembak langsung ID nya
            if(idcat == 1){
                document.getElementById('merk').innerHTML = "";
                document.getElementById('merk').innerHTML = "@foreach($merkPro as $item) <option value='{{ $item->Merk->id }}'>{{ $item->Merk->nama_merk }}</option>  @endforeach";
            }
            else{
                document.getElementById('merk').innerHTML = "";
                document.getElementById('merk').innerHTML = "@foreach($merkOth as $item) <option value='{{ $item->Merk->id }}'>{{ $item->Merk->nama_merk }}</option> @endforeach";
            }
        }

        function ubahMerk(){
            var namamerk = merk.options[merk.selectedIndex].text;
            if(namamerk == "Intel"){
                document.getElementById('socket').innerHTML = "";
                document.getElementById('socket').innerHTML = "@foreach($socketintel as $item)<option value='{{ $item->id }}'>{{ $item->nama_socket }}</option> @endforeach";
            }
            else if(namamerk == "AMD"){
                document.getElementById('socket').innerHTML = "";
                document.getElementById('socket').innerHTML = "@foreach($socketamd as $item)<option value='{{ $item->id }}'>{{ $item->nama_socket }}</option> @endforeach";
            }
        }


        // function tambahsocket(){
        //     var namasocketbaru = document.getElementById('socketbaru').value;
        //     var socketbarumerk = document.getElementById('socketbarumerk').value;
        //     fetch('/dashboard/barang/tambahsocket?namasocketbaru='+ namasocketbaru + "&socketbarumerk=" + socketbarumerk)
        //         .then(response => response.json())
        //         .then(location.reload())
        // }

        // function addsocket(){
        //     document.getElementById('divsocketbaru').style.display = "";
        // }

        // function tambahmerk(){
        //     var namamerkbaru = document.getElementById('merkbaru').value;
        //     var kategorimerkbaru = document.getElementById('merkcategory').value;
        //     fetch('/dashboard/barang/tambahmerk?namamerkbaru=' + namamerkbaru + '&kategorimerkbaru=' + kategorimerkbaru)
        //         .then(response => response.json())
        //         .then(alert('Berhasil menambahkan merk baru'))
        //         .then(location.reload())
        // }

        // function addmerk() {
        //     document.getElementById('divmerkbaru').style.display = "";
        // }

        function listgroupclick(merk){
            var pilih = document.getElementById(merk).innerHTML;
            document.getElementById('merk2').value = pilih;
            pilihan();
            resetdata();
        }

        function resetdata(){
            var ulmerk = document.getElementById('ulmerk');
            ulmerk.innerHTML = "";
        }

        function pilihan(){
            var merkpilihan = document.getElementById('merkpilihan');
            var merkpilihan2 = document.getElementById('merk2');
            merkpilihan.value = merkpilihan2.value;
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
            //slug.value = "woy";
        });

    </script>
@endsection
