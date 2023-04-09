{{-- @dd($list) --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($list as $item)
        Alamat : {{ $item->alamat }} <br>
        Provinsi : <a href="/cariprovinsi/{{ $item->provinsi }}">{{ $item->provinsi }}</a> <br>
        Kabupaten/Kota : {{ $item->kabupaten }} <br>
        Kecamatan : {{ $item->kecamatan }} <br>
        Kelurahan : {{ $item->kelurahan }} <br>
        Kode Pos : {{ $item->kodepos }} <br><br>
    @endforeach
</body>
</html>
