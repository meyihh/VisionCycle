<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionCycle</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * { font-family: 'Roboto', sans-serif; box-sizing: border-box; }

        body { background: #FBFDF9; margin: 0; }

        /* ── Sidebar ── */
        .sidebar {
            width: 247px; min-height: 100vh; background: #F8F9FA;
            border-right: 1px solid #BEBEBE; box-shadow: 2px 0 20px rgba(0,0,0,.25);
            display: flex; flex-direction: column;
            position: fixed; top: 0; left: 0; height: 100%; z-index: 100;
        }
        .sidebar-logo { display: flex; flex-direction: column; align-items: center; padding: 8px 0 15px; }
        .sidebar-logo img  { width: 93px; height: 93px; object-fit: contain; }
        .sidebar-logo span { font-size: 20px; font-weight: 700; color: #75B06F; text-align: center; margin-top: -4px; }
        .sidebar-divider   { border: none; border-top: 1px solid #B3B3B3; margin: 0; }
        .nav-links { flex: 1; }
        .nav-item {
            display: flex; align-items: center; gap: 10px; padding: 8px 24px; height: 38px;
            text-decoration: none; color: #555; font-size: 18px; font-weight: 400;
            white-space: nowrap; transition: background .15s;
        }
        .nav-item:hover  { background: #e4ede4; color: #555; }
        .nav-item.active { background: #90AB8B; color: #F8F9FA; font-weight: 500; }
        .nav-item img    { width: 22px; height: 22px; object-fit: contain; flex-shrink: 0; }

        /* ── Main ── */
        .main-wrapper { margin-left: 247px; padding: 36px 32px 60px; }
        .page-title    { font-size: 36px; font-weight: 700; color: #75B06F; line-height: 42px; }
        .page-subtitle { font-size: 20px; color: #4C4C4C; margin-top: 4px; margin-bottom: 28px; }

        /* ── Stat card ── */
        .stat-card {
            background: #fff; border: 1px solid #D9D9D9;
            box-shadow: 0 1px 5px rgba(0,0,0,.20); border-radius: 8px;
            padding: 16px 20px; display: flex; align-items: center;
            justify-content: space-between; height: 112px;
        }
        .stat-label { font-size: 18px; color: #4C4C4C; }
        .stat-value { font-size: 36px; color: #2C2C2C; font-weight: 400; line-height: 1.1; }
        .stat-icon  {
            width: 78px; height: 78px; border-radius: 5px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
        }
        .stat-icon img { width: 44px; height: 44px; object-fit: contain; }
        .icon-green  { background: #70B37D; }
        .icon-blue   { background: #3A9AFF; }
        .icon-purple { background: #9B5DEB; }

        /* ── Chart card ── */
        .chart-card {
            background: #fff; border: 1px solid #D9D9D9;
            box-shadow: 0 1px 5px rgba(0,0,0,.20);
            border-radius: 8px; padding: 20px 24px; height: 100%;
        }
        .chart-title { font-size: 20px; font-weight: 500; color: #2C2C2C; }
        .chart-date  { font-size: 14px; color: #2C2C2C; margin-top: 3px; }

        /* ── Pie ── */
        .pie-inner { display: flex; align-items: center; gap: 20px; margin-top: 16px; flex-wrap: wrap; }
        .pie-legend { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 18px; }
        .pie-legend li { display: flex; align-items: center; gap: 10px; font-size: 18px; color: #4C4C4C; }
        .dot { width: 13px; height: 13px; border-radius: 50%; flex-shrink: 0; }
        .pie-chart-wrap { flex: 1; display: flex; align-items: center; justify-content: center; min-width: 160px; }
        .pie-chart-wrap canvas { max-width: 200px; max-height: 200px; }

        /* ── Canvas wrappers ── */
        .bar-wrap  { position: relative; height: 220px; margin-top: 12px; }
        .line-wrap { position: relative; height: 240px; margin-top: 12px; }

        /* ── Custom line chart legend ── */
        .line-legend {
            display: flex; justify-content: center;
            gap: 32px; margin-top: 12px; flex-wrap: wrap;
        }
        .line-legend-item {
            display: flex; align-items: center; gap: 6px;
            font-size: 13px; color: #4C4C4C;
        }
        /* The line+dot icon */
        .legend-line-dot {
            position: relative;
            width: 28px; height: 12px;
            display: flex; align-items: center; justify-content: center;
        }
        .legend-line-dot::before {
            content: '';
            position: absolute;
            top: 50%; left: 0; right: 0;
            height: 2px;
            background: var(--lc);
            transform: translateY(-50%);
        }
        .legend-line-dot::after {
            content: '';
            position: absolute;
            width: 8px; height: 8px;
            border-radius: 50%;
            background: var(--lc);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <img src="drawable/logo.png" alt="Logo">
        <span>VisionCycle</span>
    </div>
    <hr class="sidebar-divider">
    <nav class="nav-links">
        <a href="dashboard.html" class="nav-item active">
            <img src="drawable/dashboard_active.png" alt=""> Dashboard
        </a>
        <a href="#" class="nav-item">
            <img src="drawable/classifications.png" alt=""> Classifications
        </a>
        <a href="#" class="nav-item">
            <img src="drawable/users.png" alt=""> Users
        </a>
        <a href="#" class="nav-item">
            <img src="drawable/profile_admin.png" alt=""> Profile
        </a>
    </nav>
    <a href="#" class="nav-item">
        <img src="drawable/logout_admin.png" alt=""> Logout
    </a>
</aside>

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

<script>
    // Pie
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: ['Recyclable', 'Compostable', 'Non-Recyclable'],
            datasets: [{
                data: [60, 20, 20],
                backgroundColor: ['#63BD73', '#F5B66F', '#FF4B4B'],
                borderColor: '#fff', borderWidth: 3
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: true,
            plugins: { legend: { display: false } }
        }
    });

    // Bar
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['6:00 AM', '9:00 AM', '12:00 PM', '3:00 PM', '6:00 PM', '9:00 PM'],
            datasets: [
                { label: 'Recyclable',     data: [1, 2, 10, 11, 13, 9],  backgroundColor: '#63BD73' },
                { label: 'Non-Recyclable', data: [0, 1,  7,  9, 13, 12], backgroundColor: '#FF4B4B' },
                { label: 'Compostable',    data: [0, 0,  7,  6,  8,  4], backgroundColor: '#F5B66F' }
            ]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            scales: {
                x: { grid: { display: false }, ticks: { font: { size: 11 } } },
                y: { beginAtZero: true, max: 15, ticks: { stepSize: 5 } }
            },
            plugins: {
                legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 12 }, padding: 10 } }
            }
        }
    });

    // Line — legend hidden, using custom HTML legend below
    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [
                {
                    label: 'Recyclable',
                    data: [13, 13, 13, 15, 13, 17, 19],
                    borderColor: '#63BD73', pointBackgroundColor: '#63BD73',
                    pointBorderColor: '#63BD73', pointRadius: 5,
                    borderWidth: 2, tension: 0.4, fill: false
                },
                {
                    label: 'Non-Recyclable',
                    data: [5, 6, 5, 6, 5, 8, 4],
                    borderColor: '#FF4B4B', pointBackgroundColor: '#FF4B4B',
                    pointBorderColor: '#FF4B4B', pointRadius: 5,
                    borderWidth: 2, tension: 0.4, fill: false
                },
                {
                    label: 'Compostable',
                    data: [7, 10, 8, 11, 9, 9, 12],
                    borderColor: '#F5B66F', pointBackgroundColor: '#F5B66F',
                    pointBorderColor: '#F5B66F', pointRadius: 5,
                    borderWidth: 2, tension: 0.4, fill: false
                }
            ]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            scales: {
                x: { grid: { display: false }, ticks: { font: { size: 14 }, color: '#222121' } },
                y: { beginAtZero: true, max: 20, ticks: { stepSize: 5, font: { size: 13 }, color: '#222121' }, grid: { color: 'rgba(0,0,0,0.06)' } }
            },
            plugins: {
                legend: { display: false }  // hidden — using custom HTML legend
            }
        }
    });
</script>

</body>
</html>