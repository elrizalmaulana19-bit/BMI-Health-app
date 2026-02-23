<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard BMI</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .title {
            font-size: 26px;
            font-weight: bold;
        }

        .btn {
            background: #4CAF50;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .card-title {
            font-size: 14px;
            color: #888;
        }

        .card-value {
            font-size: 28px;
            font-weight: bold;
            margin-top: 6px;
        }

        .status-normal { color:#4CAF50; }
        .status-kurus { color:#2196F3; }
        .status-gemuk { color:#FF9800; }
        .status-obesitas { color:#F44336; }

        .section {
            background: white;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        th {
            background: #fafafa;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <div class="title">Dashboard BMI</div>
        <a href="/bmi" class="btn">+ Hitung BMI</a>
    </div>

    @php
        $statusClass = '';
        if($latest){
            if($latest->category=='Normal') $statusClass='status-normal';
            elseif($latest->category=='Kurus') $statusClass='status-kurus';
            elseif($latest->category=='Gemuk') $statusClass='status-gemuk';
            else $statusClass='status-obesitas';
        }
    @endphp

    <div class="cards">
        <div class="card">
            <div class="card-title">BMI Terakhir</div>
            <div class="card-value">{{ $latest->bmi ?? '-' }}</div>
        </div>

        <div class="card">
            <div class="card-title">Kategori</div>
            <div class="card-value {{ $statusClass }}">
                {{ $latest->category ?? '-' }}
            </div>
        </div>

        <div class="card">
            <div class="card-title">Total Catatan</div>
            <div class="card-value">{{ $records->count() }}</div>
        </div>
    </div>

    <div class="section">
        <h3>Grafik Perkembangan BMI</h3>
        <canvas id="bmiChart"></canvas>
    </div>

    <div class="section">
        <h3>Riwayat BMI</h3>
        <table>
            <tr>
                <th>Tanggal</th>
                <th>Tinggi</th>
                <th>Berat</th>
                <th>BMI</th>
                <th>Kategori</th>
            </tr>

            @foreach($records as $r)
            <tr>
                <td>{{ $r->created_at->format('d M Y') }}</td>
                <td>{{ $r->height }} cm</td>
                <td>{{ $r->weight }} kg</td>
                <td>{{ $r->bmi }}</td>
                <td>{{ $r->category }}</td>
            </tr>
            @endforeach
        </table>
    </div>

</div>

<script>
    const bmiData = @json($records->pluck('bmi'));
    const bmiDates = @json($records->pluck('created_at')->map(fn($d)=>$d->format('d M')));

    new Chart(document.getElementById('bmiChart'), {
        type: 'line',
        data: {
            labels: bmiDates,
            datasets: [{
                label: 'BMI',
                data: bmiData,
                borderWidth: 3,
                tension: 0.3
            }]
        },
        options: {
            plugins:{ legend:{ display:false }},
            scales:{
                y:{ beginAtZero:false }
            }
        }
    });
</script>

</body>
</html>