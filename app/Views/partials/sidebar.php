<div class="sidebar text-black d-flex flex-column flex-shrink-0 p-3">
    <a href="<?= BASE_URL . getDashboardUrl() ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        Logo
    </a>
    <hr class="text-white">
    <ul class="nav nav-pills flex-column mb-auto">
        <?php
        $menuItems = getMenuItems();
        foreach ($menuItems as $item) : ?>
            <li class="nav-item mb-2">
                <a href="<?= BASE_URL . $item['url'] ?>" class="nav-link text-white d-flex align-items-center gap-2">
                    <?= $item['icon'] ?>
                    <?= $item['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="flex-grow-1 overflow-auto">