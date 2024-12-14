<div class="sidebar sidebar-modern text-white d-flex flex-column flex-shrink-0 p-3 shadow-lg">
    <a href="<?= BASE_URL . getDashboardUrl() ?>" class="sidebar-brand d-flex align-items-center justify-content-center my-3 mb-md-0 me-md-auto text-white">
        <img src="<?= BASE_URL ?>/public/images/climan_logo.png" alt="Logo" width="180" class="img-fluid logo-transition">
    </a>
    <hr class="sidebar-divider my-3">
    <ul class="nav nav-pills flex-column mb-auto sidebar-menu">
        <?php
        $menuItems = getMenuItems();
        foreach ($menuItems as $item) : ?>
            <li class="nav-item mb-2">
                <a href="<?= BASE_URL . $item['url'] ?>" class="nav-link sidebar-link <?= $item['active'] ? 'active' : 'link-light' ?> d-flex align-items-center gap-3 py-2 px-3 rounded-3 transition-all">
                    <span class="sidebar-icon"><?= $item['icon'] ?></span>
                    <span class="sidebar-text"><?= $item['title'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="flex-grow-1 overflow-auto">