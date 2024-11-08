<div class="sidebar text-black d-flex flex-column flex-shrink-0 p-3">
    <a href="<?= BASE_URL . getDashboardUrl() ?>" class="d-flex align-items-center justify-content-center my-3 mb-md-0 me-md-auto text-white">
        <img src="<?= BASE_URL ?>/public/images/climan_logo.png" alt="" width="200">
    </a>
    <hr class="text-white">
    <ul class="nav nav-pills flex-column mb-auto">
        <?php
        $menuItems = getMenuItems();
        foreach ($menuItems as $item) : ?>
            <li class="nav-item mb-2">
                <a href="<?= BASE_URL . $item['url'] ?>" class="nav-link <?= $item['active'] ? 'active' : 'link-dark' ?> text-white d-flex align-items-center gap-2">
                    <?= $item['icon'] ?>
                    <?= $item['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="flex-grow-1 overflow-auto">