@extends('layouts.base')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Daftar Properti</h1>
        <a href="{{ route('admin.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah Properti
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tipe</th>
                    <th>Title</th>
                    <th>Luas tanah</th>
                    <th>Luas bangunan</th>
                    <th>Desc1</th>
                    <th>Desc2</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($propertys as $property)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $property->tipe }}</td>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->luas_tanah }} m²</td>
                    <td>{{ $property->luas_bangunan }} m²</td>
                    <td>{{ $property->desc1 }}</td>
                    <td>{{ $property->desc2 }}</td>
                    <td>{{ $property->harga }}</td>
                    <td>
                        @if ($property->foto)
                            <img src="{{ asset('upload/foto/' . $property->foto) }}" alt="Foto Properti" class="rounded img-fluid" style="max-width: 100px; height: auto;">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.edit', $property->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
