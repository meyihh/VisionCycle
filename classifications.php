<?php $activePage = 'classifications'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionCycle</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/classifications.css" rel="stylesheet">
    <link href="css/logout.css" rel="stylesheet">
</head>
<body>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Main -->
<div class="main-wrapper">

    <div class="page-title">Classifications</div>
    <div class="page-subtitle">Review user-uploaded waste classifications</div>

    <!-- Controls -->
    <div class="controls-row">
        <div class="search-wrap">
            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#757575" stroke-width="1.5">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" id="searchInput" placeholder="Search by user or waste item" oninput="filterCards()">
        </div>

        <select class="cat-select" id="catFilter" onchange="filterCards()">
            <option value="">All Categories</option>
            <option value="Recyclable">Recyclable</option>
            <option value="Non-Recyclable">Non-Recyclable</option>
            <option value="Compostable">Compostable</option>
        </select>

        <div class="pagination-wrap" id="paginationWrap"></div>
    </div>

    <div class="showing-text" id="showingText">Showing 15 results</div>

    <div class="cards-grid" id="cardsGrid"></div>

</div>

<!-- Detail Modal -->
<div class="modal-overlay" id="modalOverlay" onclick="closeModal(event)">
    <div class="modal-box">
        <div class="modal-header">
            <button class="modal-close" onclick="closeModalBtn()">&#x2715;</button>
        </div>
        <img id="modalImg" src="" alt="" class="modal-img">
        <div class="modal-info-grid">
            <div class="modal-info-row">Item: <b id="modalName"></b></div>
            <div class="modal-info-row">Date: <b id="modalDate"></b></div>
            <div class="modal-info-row">Category: <span id="modalBadge"></span></div>
            <div class="modal-info-row">User ID: <b id="modalUserId"></b></div>
            <div class="modal-info-row">Uploaded by: <b id="modalUser"></b></div>
            <div class="modal-info-row">Classification ID: <b id="modalId"></b></div>
        </div>
    </div>
</div>

<!-- Logout Modal -->
<?php include 'logout.php'; ?>

<script src="js/classifications.js"></script>
<script src="js/logout.js"></script>

</body>
</html>