<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm sticky-top">
    <div class="container-fluid">
        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php if (isset($_SESSION['user'])): ?>
            <span class="text-muted fs-5">Hello, <span class="fw-bold"><?= $_SESSION['user']['first_name']; ?></span></span>
        <?php endif; ?>

        <div class="ms-auto">
            <div class="dropdown">
                <button class="btn d-flex align-items-center dropdown-toggle gap-2 px-3 py-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?= $user_logo ?>" alt="user" width="36" height="36">
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="<?= BASE_URL ?>/app/Controllers/auth/logout.php" onclick="handleLogout(); return false;">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>