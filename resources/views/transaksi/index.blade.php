@extends('template')

@section('content')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Pemateri</h4>
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th>
                    No
                </th>
                <th>
                    Tanggal Daftar
                </th>
                <th>
                    Pembeli
                </th>
                <th>
                    Email Pembeli
                </th>
                <th>
                    Tanggal Webinar
                </th>
                <th>
                    Judul Webinar
                </th>
                <th>
                    Pemateri
                </th>
                <th>
                    Lokasi
                </th>
                <th>
                    Biaya
                </th>
                <th>
                    Bukti Bayar
                </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @foreach ($transaksis as $dt)
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dt->tanggal_daftar }}</td>
                <td>{{ $dt->user->name }}</td>
                <td>{{ $dt->user->email }}</td>
                <td>{{ $dt->webinar->tanggal }}</td>
                <td>{{ $dt->webinar->judul }}</td>
                <td>{{ $dt->pemateri->nama }}</td>
                <td>{{ $dt->webinar->lokasi }}</td>
                <td>{{ $dt->webinar->biaya }}</td>
                <td>{{ $dt->bukti_pembayaran }}</td>
                </tr>
                @endforeach    
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>   

@endsection