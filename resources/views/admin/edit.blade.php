@extends('layouts.base')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Properti</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Nama rumah</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $property->title }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tipe" class="form-label">Tipe rumah</label>
                        <input type="text" name="tipe" id="tipe" class="form-control" value="{{ $property->tipe }}" required>
                    </div>                      
                    
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="luas_tanah" class="form-label">Luas Tanah (m<sup>2</sup>)</label>
                        <input type="text" name="luas_tanah" id="luas_tanah" class="form-control" value="{{ $property->luas_tanah }}">
                    </div>
                    <div class="col-md-6">
                        <label for="luas_bangunan" class="form-label">Luas Bangunan (m<sup>2</sup>)</label>
                        <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control" value="{{ $property->luas_bangunan }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="desc1" class="form-label">Kamar tidur</label>
                    <textarea name="desc1" id="desc1" class="form-control" rows="3"  required>{{ $property->desc1 }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="desc2" class="form-label">Kamar mandi</label>
                    <textarea name="desc2" id="desc2" class="form-control" rows="5" required>{{ $property->desc2 }}</textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="text" name="harga" id="harga" class="form-control" value="{{ $property->harga }}" required>
                    </div>
                    <div class="col-md-6">                        
                        @if ($property->foto)
                            <div class="mb-2"><br>
                                
                                <input type="file" name="foto" id="foto" class="form-control" onchange="previewImage(event)"><br>
                                <label>Foto</label><br><img id="preview-image" class="img-thumbnail mt-1" style="display: none; width: 200px;">
                                <img src="{{ asset('upload/foto/' . $property->foto) }}" class="img-thumbnail" id="current-image" style="width: 200px;">
                            </div>
                        @endif
                        
                    </div>
                </div>

                <div class="text-end">
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        const preview = document.getElementById('preview-image');
        const currentImage = document.getElementById('current-image');

        reader.onload = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
            if (currentImage) {
                currentImage.style.display = 'none';
            }
        };

        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>
@endsection
