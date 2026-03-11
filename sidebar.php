<?php
// Set $activePage before including this file, e.g.:
// $activePage = 'dashboard'; // dashboard | classifications | users | profile
if (!isset($activePage)) $activePage = '';

$navItems = [
    [
        'page'     => 'dashboard',
        'href'     => 'dashboard.php',
        'label'    => 'Dashboard',
        'icon'     => 'drawable/dashboard.png',
        'iconActive' => 'drawable/dashboard_active.png',
    ],
    [
        'page'     => 'classifications',
        'href'     => 'classifications.php',
        'label'    => 'Classifications',
        'icon'     => 'drawable/classifications.png',
        'iconActive' => 'drawable/classifications_active.png',
    ],
    [
        'page'     => 'users',
        'href'     => 'users.php',
        'label'    => 'Users',
        'icon'     => 'drawable/users.png',
        'iconActive' => 'drawable/users_active.png',
    ],
    [
        'page'     => 'profile',
        'href'     => 'profile.php',
        'label'    => 'Profile',
        'icon'     => 'drawable/profile_admin.png',
        'iconActive' => 'drawable/profile_admin_active.png',
    ],
];
?>

<link href="css/sidebar.css" rel="stylesheet">

<aside class="sidebar">
    <div class="sidebar-logo">
        <img src="drawable/logo.png" alt="Logo">
        <span>VisionCycle</span>
    </div>
    <hr class="sidebar-divider">
    <nav class="nav-links">
        <?php foreach ($navItems as $item):
            $isActive = ($activePage === $item['page']);
            $activeClass = $isActive ? ' active' : '';
            $currentIcon = $isActive ? $item['iconActive'] : $item['icon'];
        ?>
        <a href="<?= $item['href'] ?>" class="nav-item<?= $activeClass ?>">
            <img src="<?= $currentIcon ?>"
                 data-active="<?= $item['iconActive'] ?>"
                 data-inactive="<?= $item['icon'] ?>"
                 alt="<?= $item['label'] ?>">
            <?= $item['label'] ?>
        </a>
        <?php endforeach; ?>
    </nav>
    <div class="sidebar-bottom">
        <hr class="sidebar-divider">
        <a href="logout.php" class="nav-item logout-item">
            <img src="drawable/logout_admin.png"
                 data-active="drawable/logout_admin_active.png"
                 data-inactive="drawable/logout_admin.png"
                 alt="Logout">
            Logout
        </a>
    </div>
</aside>

<script>
    document.querySelectorAll('.nav-item').forEach(function(item) {
        var img = item.querySelector('img');
        if (!img || !img.dataset.active) return;

        item.addEventListener('mouseenter', function() {
            if (!item.classList.contains('active')) {
                img.src = img.dataset.active;
            }
        });
        item.addEventListener('mouseleave', function() {
            if (!item.classList.contains('active')) {
                img.src = img.dataset.inactive;
            }
        });
    });
</script>