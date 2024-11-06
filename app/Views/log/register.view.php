<?php

require 'app/Views/partials/header.php';

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$old = $_SESSION['old'] ?? [];
unset($_SESSION['old']);
?>

<div class="w-100 d-flex justify-content-center align-items-center">
    <div class="w-50 d-flex justify-content-center flex-column rounded-4 shadow p-4 text-bg-light">
        <div class="text-center mb-4">
            <h1>Create an account</h1>
            <p>Already have an account? <a href="<?= BASE_URL ?>" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Sign In</a></p>
        </div>
        <form action="<?= BASE_URL ?>/register" method="POST">
            <div class="w-100 container">
                <div class="w-100 center row row-cols-2">
                    <div class="col mb-4">
                        <label class="form-label" for="first-name">First Name</label>
                        <input class="form-control" type="text" name="first-name" id="first-name" autocomplete="given-name" autocapitalize="on" placeholder="Jepoy">
                    </div>

                    <div class="col mb-4">
                        <label class="form-label" for="last-name">Last Name</label>
                        <input class="form-control" type="text" name="last-name" id="last-name" autocomplete="family-name" autocapitalize="on" placeholder="Hidalgo">
                    </div>

                    <div class="col mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control mb-1" type="text" name="username" id="username" autocomplete="username" placeholder="Jepoyqt">
                        <?php if (isset($errors['username'])): ?>
                            <div class="text-danger fs-6"><?= $errors['username'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="col mb-4">
                        <label class="form-label" for="role">Role</label>
                        <select class="form-select" name="role" id="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <div class="col mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" autocomplete="password">
                    </div>

                    <div class="col mb-4">
                        <label class="form-label" for="confirm-password">Confirm Password</label>
                        <input class="form-control" type="password" name="confirm-password" id="confirm-password" autocomplete="password">
                    </div>

                    <div class="w-100 d-flex justify-content-center align-items-center text-nowrap text-danger">
                        <?php if (isset($errors['password_length'])): ?>
                            <p><?= $errors['password_length'] ?></p>
                        <?php endif; ?>

                        <?php if (isset($errors['password'])): ?>
                            <p><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="w-100">
                        <button type="submit" name="submit-btn" id="submit-btn" class="w-100 btn btn-primary">Sign up</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require 'app/Views/partials/footer.php' ?>