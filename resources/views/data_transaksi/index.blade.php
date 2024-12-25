<!-- resources/views/data_transaksi/index.blade.php -->
@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Daftar Transaksi Pembeli</h2>
    <!-- Table displaying all Pembeli and their associated Property data -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Nomor Kartu kredit</th>
                        <th>Nama Properti</th>
                        <th>Tipe properti</th>
                        <th>Alamat penagih</th>
                        <th>Harga</th>
                        <th>Aksi</th>                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembelis as $pembeli)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pembeli->nama }}</td>
                            <td>{{ $pembeli->nomor_kartu }}</td>                           
                            <td>{{ $pembeli->property->title }}</td>
                            <td>{{ $pembeli->property->tipe }}</td>
                            <td>{{ $pembeli->alamat_penagih }}</td>
                            <td>{{ $pembeli->property->harga }}</td>
                            <td>
                                <!-- Delete Action -->
                                <form action="{{ route('pembeli.destroy', $pembeli->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
