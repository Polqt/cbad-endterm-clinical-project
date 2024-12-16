<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/sidebar.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="container-fluid p-4">
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h2 class="mb-0"><?= ucfirst(htmlspecialchars($user['role'])) ?> Profile</h2>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="<?= htmlspecialchars($user_logo) ?>" alt="Profile Image" class="rounded-circle" style="width: 150px; height: 150px;">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">First Name</label>
                    <p class="form-control"><?= htmlspecialchars($user['first_name']) ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Last Name</label>
                    <p class="form-control"><?= htmlspecialchars($user['last_name']) ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Username</label>
                    <p class="form-control"><?= htmlspecialchars($user['username']) ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Role</label>
                    <p class="form-control"><?= ucfirst(htmlspecialchars($user['role'])) ?></p>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Account Created</label>
                    <p class="form-control"><?= htmlspecialchars($user['created_at']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'app/Views/partials/footer.php' ?>