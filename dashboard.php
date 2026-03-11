<?php $activePage = 'dashboard'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionCycle</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/logout.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Main -->
<div class="main-wrapper">

    <div class="page-title">Dashboard</div>
    <div class="page-subtitle">Overview of waste classification activity</div>

    <!-- Stat Cards -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="stat-card">
                <div>
                    <div class="stat-label">Total Scans</div>
                    <div class="stat-value">117</div>
                </div>
                <div class="stat-icon icon-green">
                    <img src="drawable/total_scans.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="stat-card">
                <div>
                    <div class="stat-label">Total Users</div>
                    <div class="stat-value">11</div>
                </div>
                <div class="stat-icon icon-blue">
                    <img src="drawable/total_users.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="stat-card">
                <div>
                    <div class="stat-label">Total Scans This Week</div>
                    <div class="stat-value">50</div>
                </div>
                <div class="stat-icon icon-purple">
                    <img src="drawable/weekly_total_scans.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Pie + Bar -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-lg-6">
            <div class="chart-card">
                <div class="chart-title">Waste Category Distribution</div>
                <div class="pie-inner">
                    <ul class="pie-legend">
                        <li><span class="dot" style="background:#63BD73;"></span>Recyclable 60%</li>
                        <li><span class="dot" style="background:#FF4B4B;"></span>Non-Recyclable 20%</li>
                        <li><span class="dot" style="background:#F5B66F;"></span>Compostable 20%</li>
                    </ul>
                    <div class="pie-chart-wrap">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="chart-card">
                <div class="chart-title">Daily Classification Breakdown</div>
                <div class="chart-date">February 27, 2026</div>
                <div class="bar-wrap">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Weekly Line Chart -->
    <div class="row g-3">
        <div class="col-12">
            <div class="chart-card">
                <div class="chart-title">Weekly Classification Trends</div>
                <div class="line-wrap">
                    <canvas id="lineChart"></canvas>
                </div>
                <!-- Custom legend: line with dot in center -->
                <div class="line-legend">
                    <div class="line-legend-item">
                        <div class="legend-line-dot" style="--lc: #63BD73;"></div>
                        <span>Recyclable</span>
                    </div>
                    <div class="line-legend-item">
                        <div class="legend-line-dot" style="--lc: #FF4B4B;"></div>
                        <span>Non-Recyclable</span>
                    </div>
                    <div class="line-legend-item">
                        <div class="legend-line-dot" style="--lc: #F5B66F;"></div>
                        <span>Compostable</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include 'logout.php'; ?>

<script src="js/dashboard.js"></script>
<script src="js/logout.js"></script>

</body>
</html>