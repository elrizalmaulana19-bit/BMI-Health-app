<!DOCTYPE html>
<html lang="id">
<style>
.bmi-card {
    margin-top: 25px;
    padding: 25px;
    border-radius: 16px;
    text-align: center;
    font-family: sans-serif;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}

.bmi-value {
    font-size: 42px;
    font-weight: 700;
}

.bmi-label {
    font-size: 14px;
    opacity: 0.7;
}

.bmi-category {
    margin-top: 8px;
    font-size: 18px;
    font-weight: 600;
}

/* warna kategori */
.blue { background:#e3f2fd; color:#1976d2; }
.green { background:#e8f5e9; color:#2e7d32; }
.orange { background:#fff3e0; color:#ef6c00; }
.red { background:#ffebee; color:#c62828; }
</style>
<head>
    <meta charset="UTF-8">
    <title>Hitung BMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
body {
    font-family: 'Segoe UI', sans-serif;
}
.card {
    border-radius: 15px;
}
button {
    border-radius: 10px;
}
</style>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-body">
                    <h4 class="text-center mb-4">Kalkulator BMI</h4>

                    <form method="POST" action="/hitung">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Tinggi (cm)</label>
                            <input type="number" name="tinggi" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Berat (kg)</label>
                            <input type="number" name="berat" class="form-control" required>
                        </div>

                        <button class="btn btn-success w-100">Hitung BMI</button>
                    </form>

                    @if(isset($bmi))
                    <div class="bmi-card {{ $color }}">
                        <div class="bmi-value">{{ $bmi }}</div>
                        <div class="bmi-label">BMI Anda</div>
                        <div class="bmi-category">{{ $kategori }}</div>
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>