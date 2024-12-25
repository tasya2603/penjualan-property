<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- File CSS Eksternal -->
</head>

<style>
html {
        scroll-behavior: smooth;
    }

.hero-section {
    margin: 0;
    padding: 0;
}

.hero-image {
    background: url('foto/rumah.jpg') no-repeat center center;
    background-size: cover;
    height: 80vh;
    min-height: 400px;
}

.hero-content {
    background-color: white;
    margin-top: -5px;
    padding-top: 20px;
    padding-bottom: 20px;
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
}

.card {
    transition: transform 0.3s ease-in-out;
}

.card:hover {
    transform: scale(1.03);
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-footer .btn {
    margin-bottom: 5px;
}

.text-primary {
    color: #007bff !important;
}

.text-success {
    color: #28a745 !important;
}

@media (max-width: 768px) {
    .hero-section {
        padding: 50px 0;
    }
    .hero-section h1 {
        font-size: 1.8rem;
    }
}

</style>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow fixed-top">
    <a class="navbar-brand" href="#">Gede property</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#unit">Unit</a>
            </li>                
        </ul>
    </div>
</nav>
<div class="hero-section" style="padding-top: 10px;">
    <div class="hero-image"></div>
    <div class="hero-content text-center text-dark py-5">
        <div class="container">
            <h3 class="fw-bold mb-3">
                Mau hunian nyaman, lingkungan asri, bebas banjir, fasilitas lengkap, modern, dan dekat dengan pusat bisnis?
            </h3>
            <h2 class="text-primary fw-bold">BTN Merpati</h2>
            <p class="lead mt-4">
                Perumahan BTN VILA MAS memberikan pilihan yang tepat untuk kebutuhan rumah bagi Anda dan keluarga. Kawasan The New Integrated City yang dikembangkan oleh BTN VILA MAS merupakan bagian dari Ciputra Group. Menghadirkan hunian rumah modern yang terintegrasi dengan fasilitas pendukung yang lengkap, akan menjadikan rumah sebagai hunian nyaman dan investasi bernilai tinggi.
            </p>
        </div>
    </div>
</div>
    <section id="unit" class="container py-5">
        <div class="row">
            @forelse ($propertys as $property)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="{{ asset('upload/foto/' . $property->foto) }}" class="card-img-top" alt="{{ $property->model }}">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $property->tipe }} - {{ $property->title }}</h5>
                        <p class="card-text">
                            <strong>Luas Tanah:</strong> {{ $property->luas_tanah }} m² <br>
                            <strong>Luas Bangunan:</strong> {{ $property->luas_bangunan }} m² <br>
                            {{ $property->desc1 }} <br>
                            {{ $property->desc2 }}
                        </p>
                        <h5 class="text-success">{{ $property->harga }}</h5>
                        <p>*kredit only</p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{{ route('transaksi.index', $property->id) }}" class="btn btn-primary btn-block">
                            Lakukan Transaksi <i class="fas fa-shopping-cart"></i>
                        </a>
                        <a href="https://wa.me/6282211155351" class="btn btn-outline-success btn-block">
                            Hubungi Admin <i class="fas fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Tidak ada property tersedia saat ini.</p>
            </div>
            @endforelse
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
