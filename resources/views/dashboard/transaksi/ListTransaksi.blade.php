@extends('dashboard.layout.dashboard')

@section('container')
    <h3>List Transaksi</h3>
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
                            <a type="button" class="btn btn-success">Konfirmasi</a>
                            <a class="btn btn-primary" href="/dashboard/transaksi/{{ $item->id }}">Detail Transaksi</a>
                        @else
                            <a class="btn btn-primary" href="/dashboard/transaksi/{{ $item->id }}">Detail Transaksi</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
