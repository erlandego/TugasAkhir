@extends('dashboard.layout.dashboard')

@section('container')
    <h3>List Transaksi</h3>
    @if (session()->has('confirmed'))
        <div class="alert alert-success" role="alert">
            {{ session('confirmed') }}
        </div>
    @endif
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Order Id</th>
                <th>Total</th>
                <th>Ongkos Kirim</th>
                <th>Kurir Shipping</th>
                <th>Paket Shipping</th>
                <th>Alamat</th>
                <th>Tanggal Transaksi</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hjual as $item)
                <tr>
                    <td>{{ $item->User->name }}</td>
                    <td>{{ $item->order_id }}</td>
                    <td>Rp{{ number_format($item->total_belanja) }}</td>
                    <td>Rp{{ number_format($item->total_shipping) }}</td>
                    <td>{{ $item->kurir_pengiriman }}</td>
                    <td>{{ $item->paket_pengiriman }}</td>
                    <td>{{ $item->Address->alamat.", ".$item->City->city_name.", ".$item->Provinsi->nama_provinsi }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        @if($item->status == 'Paid')
                            <a href="/dashboard/KonfirmasiItem/{{ $item->id }}" class="btn btn-success">Konfirmasi</a>
                            <a class="btn btn-primary" href="/dashboard/transaksi/{{ $item->id }}">Detail Transaksi</a>
                        @elseif($item->status == 'confirmed')
                            <a class="btn btn-primary" href="/dashboard/KirimItem/{{ $item->id }}">Sudah dikirim</a>
                            <a class="btn btn-primary" href="/dashboard/transaksi/{{ $item->id }}">Detail Transaksi</a>
                        @elseif($item->status == 'received')
                            <a href="/dashboard/SelesaikanItem/{{ $item->id }}" class="btn btn-success">Selesaikan</a>
                        @else
                            <a class="btn btn-primary" href="/dashboard/transaksi/{{ $item->id }}">Detail Transaksi</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
