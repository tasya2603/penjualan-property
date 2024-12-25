@extends('layouts.base')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Tambah daftar properti</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                <div class="col-md-6">
                    <label for="title" class="form-label">Nama rumah</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Arbory Residence" required>
                </div>
                    <div class="col-md-6">
                        <label for="tipe" class="form-label">Tipe rumah</label>
                        <input type="text" name="tipe" id="tipe" class="form-control" placeholder="Type 2 ( 5,5 x 15 )" required>
                    </div>                      
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="luas_tanah" class="form-label">Luas Tanah (m<sup>2</sup>)</label>
                        <input type="text" name="luas_tanah" id="luas_tanah" class="form-control" placeholder="Contoh: 120">
                    </div>
                    <div class="col-md-6">
                        <label for="luas_bangunan" class="form-label">Luas Bangunan (m<sup>2</sup>)</label>
                        <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control" placeholder="Contoh: 80">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="desc1" class="form-label">Kamar tidur</label>
                    <textarea name="desc1" id="desc1" class="form-control" rows="3" placeholder="Jumlah kamar tidur" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="desc2" class="form-label">Kamar mandi</label>
                    <textarea name="desc2" id="desc2" class="form-control" rows="5" placeholder="Jumlah kamar mandi"></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="text" name="harga" id="harga" class="form-control" placeholder="Contoh: Rp 500.000.000" required>
                    </div>
                    <div class="col-md-6">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                </div>

                <div class="text-end">
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
