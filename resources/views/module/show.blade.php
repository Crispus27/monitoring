<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Données du Module</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Nom du module: {{ $module->name }}</h2>
        <div class="card card-custom">
            <div class="card-body">
                <p><strong>Valeur Actuelle:</strong> {{ $latestHistory ? $latestHistory->value : 'N/A' }}</p>
                <p><strong>Nombre de Données Envoyées:</strong> {{ $historyCount }}</p>
                <p><strong>Statut actuel:</strong>
                    @if($historyCount > 0 && $latestHistory->status === 0)
                        <span class="badge badge-danger badge-custom">En Panne</span>
                    @else
                        <span class="badge badge-success badge-custom">En Fonction</span>
                    @endif
                </p>
            </div>
        </div>
        <div class="chart-container">
            <canvas id="historyChart"></canvas>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

    <script>
        var ctx = document.getElementById('historyChart').getContext('2d');
        var moduleHistory = @json($module->histories);
        var labels = moduleHistory.map(history => history.created_at);
        var values = moduleHistory.map(history => history.value);

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Valeur des Données',
                    data: values,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'minute'
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
