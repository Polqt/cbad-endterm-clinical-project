<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="d-flex flex-column flex-shrink-0 p-3 bg-secondary min-vh-100">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#home"></use>
                </svg>
                Home
            </a>
        </li>
        <li>s
            <a href="#" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#table"></use>
                </svg>
                About
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#grid"></use>
                </svg>
                Products
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-body-emphasis">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#people-circle"></use>
                </svg>
                Customers
            </a>
        </li>
    </ul>
    <hr>
</div>

<?php include 'app/Views/partials/footer.php' ?>