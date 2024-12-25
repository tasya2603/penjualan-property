<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Transaksi Properti</title>
    <!-- Link ke Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ikon Font Awesome untuk tombol -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Formulir Transaksi Properti</h2>

        <!-- Success/Error messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('pembeli.store') }}">
            @csrf
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                    </div>

                    <!-- Nomor Kartu Kredit/Debit -->
                    <div class="mb-3">
                        <label for="nomor_kartu" class="form-label">Nomor Kartu Kredit</label>
                        <input type="text" class="form-control" id="nomor_kartu" name="nomor_kartu" placeholder="Nomor Kartu Kredit/Debit" required>
                    </div>

                    <!-- Alamat Penagihan -->
                    <div class="mb-3">
                        <label for="alamat_penagih" class="form-label">Alamat Penagihan</label>
                        <textarea class="form-control" id="alamat_penagih" name="alamat_penagih" rows="3" placeholder="Alamat Penagihan" required></textarea>
                    </div>

                    <!-- Nama Properti -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Nama Properti</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul Properti" value="{{ $title ?? '' }}" readonly>
                    </div>

                    <!-- Tipe Properti -->
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe Properti</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Tipe Properti" value="{{ $tipe ?? '' }}" readonly>
                    </div>

                    <!-- Hidden Property ID -->
                    <input type="hidden" id="property_id" name="property_id" value="{{ $property_id }}" required>

                    <!-- Harga Properti -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Properti</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Properti" value="{{ $harga }}" readonly>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Selesaikan Transaksi</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Body Styling */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }

        /* Container Styling */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
        }

        h2 {
            font-size: 26px;
            color: #333;
        }

        /* Form Input Styling */
        .form-control {
            border-radius: 8px;
            height: 40px;
            font-size: 14px;
        }

        .form-label {
            font-weight: 500;
            font-size: 14px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 16px;
            font-weight: 500;
            padding: 12px;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            border-radius: 8px;
            font-weight: 500;
        }

        .alert-dismissible .btn-close {
            font-size: 1rem;
        }
    </style>
</body>
</html>
