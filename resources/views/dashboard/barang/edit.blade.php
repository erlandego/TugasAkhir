@extends('dashboard.layout.dashboard')

@section('container')

@php
    $kategoribarang;
    $merkproc ="";
    $merkbarang = "";
    foreach ($categories as $key => $value) {
        if($barang->category_id == $value->id){
            $kategoribarang = $value->name;
        }
    }

    foreach ($merkPro as $key => $value) {
        if($value->merk_id == $barang->merk_id){
            $merkproc = $value->Merk->nama_merk;
        }
    }

    foreach ($merkOth as $key => $value) {
        if($value->merk_id == $barang->merk_id){
            $merkbarang = $value->Merk->nama_merk;
        }
    }
    //dd($barang);
@endphp
<h2 class="mt-2 mb-3">Halaman Edit</h2>
<form method="post" action="/dashboard/barang/{{ $barang->slug }}">
    @csrf
    @method('put')
    {{-- Nama Barang --}}
    <div class="form-group mt-2 mb-3">
      <b><label for="nama_barang">Nama Barang </label></b>
      <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" placeholder="Masukkan nama barang" autofocus>
      @error('nama_barang')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
      <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $barang->slug }}">
      @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div>

    {{-- Kategori --}}
    <div class="form-group mb-3">
      <b><label for="category_id">Kategori</label></b>
      <select class="form-control" id="category_id" name="category_id" onchange="muncul()">
        @foreach ($categories as $item)
            @if($item->id == $barang->category_id){
                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
            }
            @else{
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            }
            @endif
        @endforeach
      </select>
      @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div>

    {{-- Merk --}}
    <div class="form-group mb-3" id="divmerk" @if($kategoribarang != 'Processor') {{ 'style=display:none' }} @endif>
        <b><label for="merk">Merk</label></b>
        <div class="input-group input-group-sm mb-3">
            <select class="form-control" id="merk" name="merk_id" onchange="ubahMerk()">
                @foreach ($merkPro as $item)
                    @if($item->id == $barang->merk_id){
                        <option value="{{ $item->Merk->id }}" selected>{{ $item->Merk->nama_merk }}</option>
                    }
                    @else{
                        <option value="{{ $item->Merk->id }}">{{ $item->Merk->nama_merk }}</option>
                    }
                    @endif
                @endforeach
            </select>
            <div class="input-group-prepend">
                <button type="button" class="btn btn-primary" id="addnewmerk" onclick="addmerk()">Tambahkan Merk baru</button>
            </div>
        </div>
        @error('merk_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Merk 2 --}}
    <div class="form-group mb-3" id="divmerk2" @if($kategoribarang == 'Processor') {{ 'style=display:none' }} @endif>
        <b><label for="merk2">Merk</label></b>
        @livewire('search-merk' , ['barang' => $barang , 'checker' => true])
        @error('merk_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Tambah Merk --}}
    <div class="form-group mb-3" id="divmerkbaru" style="display:none">
        <b><label for="merkbaru">Tambah Merk baru</label></b>
        <input type="text" class="form-control" id="merkbaru" name="merkbaru">
        <select class="form-control" id="merkcategory" name="merkcategory">
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button type="button" class="btn btn-primary" onclick="tambahmerk()">Tambah</button>
    </div>

    {{-- Size --}}
    <div class="form-group mb-3" id="divsize" @if($barang->size_id == null) {{ 'style=display:none' }} @endif>
        <b><label for="size">Ukuran Case</label></b>
        <select class="form-control" id="size" name="size">
            @foreach ($listsize as $item)
                @if($item->id == $barang->size_id){
                    <option value="{{ $item->id }}" selected>{{ $item->nama_ukuran }}</option>
                }
                @else{
                    <option value="{{ $item->id }}">{{ $item->nama_ukuran }}</option>
                }
                @endif
            @endforeach
        </select>
        @error('size')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- DDR --}}
    <div class="form-group mb-3" id="divddr" @if($barang->slot_id == null) {{ 'style=display:none' }} @endif>
        <b><label for="ddr">DDR</label></b>
        <select class="form-control" id="ddr" name="ddr">
            @foreach ($listslot as $item)
                @if($item->id == $barang->ddr_id){
                    <option value="{{ $item->id }}" selected>{{ $item->ddr }}</option>
                }
                @else{
                    <option value="{{ $item->id }}">{{ $item->ddr }}</option>
                }
                @endif
            @endforeach
        </select>
        @error('ddr')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Socket --}}
    <div class="form-group mb-3" id="divsocket" @if($barang->socket_id == null) {{ 'style=display:none' }} @endif>
        <b><label for="socket">Socket</label></b>
        <div class="input-group input-group-sm mb-3">
            <select class="form-control" id="socket" name="socket_id">
                @if($barang->Category->name == "Processor"){
                    @if($merkproc == 'Intel'){
                        @foreach ($socketintel as $item)
                            @if($item->id == $barang->socket_id){
                                <option value="{{ $item->id }}" selected>{{ $item->nama_socket }}</option>
                            }
                            @else{
                                <option value="{{ $item->id }}">{{ $item->nama_socket }}</option>
                            }
                            @endif
                        @endforeach
                    }
                    @elseif($merkproc == 'AMD'){
                        @foreach ($socketamd as $item)
                            @if($item->id == $barang->socket_id){
                                <option value="{{ $item->id }}" selected>{{ $item->nama_socket }}</option>
                            }
                            @else{
                                <option value="{{ $item->id }}">{{ $item->nama_socket }}</option>
                            }
                            @endif
                        @endforeach
                    }
                    @endif
                }
                @else{
                    @foreach ($allsocket as $item)
                        @if($item->id == $barang->socket_id){
                            <option value="{{ $item->id }}" selected>{{ $item->nama_socket }}</option>
                        }
                        @else{
                            <option value="{{ $item->id }}">{{ $item->nama_socket }}</option>
                        }
                        @endif
                    @endforeach
                }
                @endif
            </select>
            <div class="input-group-prepend">
                <button type="button" class="btn btn-primary" id="addnewsocket" onclick="addsocket()">Tambahkan Socket baru</button>
            </div>
        </div>
        @error('socket')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Add Socket --}}
    <div class="form-group mb-3" id="divsocketbaru" style="displaynone">
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
    </div>

    {{-- Power --}}
    <div class="form-group mb-3" id="divpower" @if($barang->power == null) {{ 'style=display:none' }} @endif>
        <b><label for="power">Power :</label></b>
        <div class="input-group input-group-sm mb-3">
            <input id="power" type="number" value="{{ $barang->power }}" class="form-control" aria-label="Small" name="power">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Watt</span>
            </div>
        </div>
        @error('power')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- NVME --}}
    <div class="form-group mb-3" id="divnvme" @if($barang->nvme == null) {{ 'style=display:none' }} @endif>
        <b><label for="nvme">Jumlah Slot NVME</label></b>
        <div class="input-group input-group-sm mb-3">
            <input id="nvme" type="number" value="{{ $barang->nvme }}" class="form-control" aria-label="Small" name="nvme">
        </div>
        @error('nvme')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Harga Barang --}}
    <div class="form-group mb-3">
        <b><label for="harga">Harga Barang</label></b>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
            </div>
            <input id="harga" type="number" value="{{ $barang->harga }}" class="form-control" aria-label="Small" name="harga" required>
        </div>
        @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Stok Barang --}}
    <div class="form-group mb-3">
        <b><label for="stok">Input Stok : </label></b>
        <div class="input-group input-group-sm mb-3">
            <input id="stok" type="number" value="{{ $barang->stok }}" class="form-control" aria-label="Small" name="stok" required>
        </div>
        @error('stok')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Berat Barang --}}
    <div class="form-group mb-3" id="divberat">
        <b><label for="berat">Berat :</label></b>
        <div class="input-group input-group-sm mb-3">
            <input id="berat" type="number" value="{{ $barang->berat }}" class="form-control" aria-label="Small" name="berat" required>
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Kg</span>
            </div>
        </div>
    </div>

    {{-- Menampilkan Gambar --}}
    <div class="form-group mb-3" id="divimage">
        @livewire('upload-image' , [
            'idbarang' => $barang->id,
            'dariedit' => true
        ])
    </div>


    {{-- Deskripsi barang --}}
    @error('deskripsi')
        <p class="text-danger"> {{ $message }} </p>
    @enderror
    <div class="form-group mb-3">
        <b><label for="deskripsi">Deskripsi barang</label></b>
        <textarea class="form-control" id="deskripsi" rows="5" name="deskripsi">{{ $barang->deskripsi }}</textarea>
    </div>
    {{-- btn submit --}}
    <button type="submit" class="btn btn-warning">Edit</button>
</form>

<script>
    const nama = document.querySelector('#nama_barang');
        const slug = document.querySelector('#slug');
        const kategori = document.querySelector('#category_id');
        const merk = document.querySelector('#merk');

        //document.getElementById('merk2').value = {{ $merkbarang }};

        document.getElementById("divsocketbaru").style.display = "none";
        document.getElementById('divmerkbaru').style.display = "none";
        // //Karena intel merk pertama yang muncul
        // document.getElementById('socket').innerHTML = "@foreach($socketintel as $item)<option value='{{ $item->id }}'>{{ $item->nama_socket }}</option> @endforeach";

        function muncul(){
            var namakategori = kategori.options[kategori.selectedIndex].text;
            var idcat = kategori.value;
            if(namakategori == "Casing"){
                document.getElementById("divsize").style.display = "";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "none";
                document.getElementById("divddr").style.display = "none";
                document.getElementById("divpower").style.display = "none";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divberat').style.display = "";
                document.getElementById('divimage').style.display = "";
            }
            else if(namakategori == "Processor"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "";
                document.getElementById("divddr").style.display = "none";
                document.getElementById("divpower").style.display = "";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divberat').style.display = "";
                document.getElementById('divimage').style.display = "";
            }
            else if(namakategori == "RAM"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "none";
                document.getElementById("divddr").style.display = "";
                document.getElementById("divpower").style.display = "";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divberat').style.display = "";
                document.getElementById('divimage').style.display = "";
            }
            else if(namakategori == "VGA Card"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "none";
                document.getElementById("divddr").style.display = "";
                document.getElementById("divpower").style.display = "";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divberat').style.display = "";
                document.getElementById('divimage').style.display = "";
            }
            else if(namakategori == "Motherboard"){
                document.getElementById("divsize").style.display = "";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "";
                document.getElementById("divddr").style.display = "";
                document.getElementById("divpower").style.display = "";
                document.getElementById("divnvme").style.display = "";
                document.getElementById('divberat').style.display = "";
                document.getElementById('divimage').style.display = "";
            }
            else if(namakategori == "Power Supply"){
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "none";
                document.getElementById("divddr").style.display = "none";
                document.getElementById("divpower").style.display = "";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divberat').style.display = "";
                document.getElementById('divimage').style.display = "";
            }
            else{
                document.getElementById("divsize").style.display = "none";
                document.getElementById("divmerk").style.display = "";
                document.getElementById("divsocket").style.display = "none";
                document.getElementById("divddr").style.display = "none";
                document.getElementById("divpower").style.display = "none";
                document.getElementById("divnvme").style.display = "none";
                document.getElementById('divberat').style.display = "";
                document.getElementById('divimage').style.display = "";
            }

            //nanti ganti , nd boleh tembak langsung ID nya
            if(idcat == 1){
                document.getElementById('merk').innerHTML = "";
                document.getElementById('merk').innerHTML = "@foreach($merkPro as $item) <option value='{{ $item->id }}'>{{ $item->nama_merk }}</option>  @endforeach";
            }
            else{
                document.getElementById('merk').innerHTML = "";
                document.getElementById('merk').innerHTML = "@foreach($merkOth as $item) <option value='{{ $item->id }}'>{{ $item->nama_merk }}</option> @endforeach";
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


        function tambahsocket(){
            var namasocketbaru = document.getElementById('socketbaru').value;
            var socketbarumerk = document.getElementById('socketbarumerk').value;
            fetch('/dashboard/barang/tambahsocket?namasocketbaru='+ namasocketbaru + "&socketbarumerk=" + socketbarumerk)
                .then(response => response.json())
                .then(location.reload())
        }

        function addsocket(){
            document.getElementById('divsocketbaru').style.display = "";
        }

        function tambahmerk(){
            var namamerkbaru = document.getElementById('merkbaru').value;
            var kategorimerkbaru = document.getElementById('merkcategory').value;
            fetch('/dashboard/barang/tambahmerk?namamerkbaru=' + namamerkbaru + '&kategorimerkbaru=' + kategorimerkbaru)
                .then(response => response.json())
                .then(alert('Berhasil menambahkan merk baru'))
                .then(location.reload())
        }

        function addmerk() {
            document.getElementById('divmerkbaru').style.display = "";
        }

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

        nama.addEventListener('change' , function(){
            fetch('/dashboard/barang/checkSlug?nama=' + nama.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
    });

</script>

@endsection
