<?php $activePage = 'users'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionCycle</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/users.css" rel="stylesheet">
    <link href="css/user_details.css" rel="stylesheet">
    <link href="css/logout.css" rel="stylesheet">
</head>
<body>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Main -->
<div class="main-wrapper">

    <div class="page-title">Users</div>
    <div class="page-subtitle">View information of registered users</div>

    <!-- Controls + Total Users Card -->
    <div class="top-controls">
        <div class="controls-left">
            <!-- Search -->
            <div class="search-wrap">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#757575" stroke-width="1.5">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input type="text" id="searchInput" placeholder="Search by name or email" oninput="filterUsers()">
            </div>
            <!-- Sort -->
            <select class="sort-select" id="sortSelect" onchange="filterUsers()">
                <option value="">Sort</option>
                <option value="name_asc">Name A–Z</option>
                <option value="name_desc">Name Z–A</option>
                <option value="scans_desc">Most Scans</option>
                <option value="scans_asc">Least Scans</option>
                <option value="id_asc">ID Ascending</option>
            </select>
        </div>

        <!-- Total Users Card -->
        <div class="total-card">
            <div class="total-icon" id="totalCount">11</div>
            <div class="total-label">Total Users</div>
        </div>
    </div>

    <!-- Table -->
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Total Scans</th>
                    <th>Registered At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="userTableBody"></tbody>
        </table>
    </div>

</div>

<!-- User Details Modal -->
<?php include 'user_details.php'; ?>

<!-- Logout Modal -->
<?php include 'logout.php'; ?>

<script src="js/users.js"></script>
<script src="js/user_details.js"></script>
<script src="js/logout.js"></script>

</body>
</html>