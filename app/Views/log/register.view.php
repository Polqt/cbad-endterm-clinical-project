<?php require 'app/Views/partials/header.php' ?>

<div class="h-100 d-flex justify-content-center align-items-center">
    <div class="w-50 text-start rounded-4 shadow p-5">
        <div class="text-center mb-4">
            <h1>Create an account</h1>
            <p>Already have an account? <a href="<?= BASE_URL ?>" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Sign In</a></p>
        </div>
        <form action="user_registration.php" method="post">
            <div class="w-100 container">
                <div class="w-100 center row row-cols-2">
                    <div class="col mb-4">
                        <label class="form-label" for="first-name">First Name</label>
                        <input class="form-control" type="text" name="first-name" id="first-name" autocomplete="off" autocapitalize="on" placeholder="Jepoy">
                    </div>

                    <div class="col mb-4">
                        <label class="form-label" for="last-name">Last Name</label>
                        <input class="form-control" type="text" name="last-name" id="last-name" autocomplete="off" autocapitalize="on" placeholder="Hidalgo">
                    </div>

                    <div class="col mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username" autocomplete="off" placeholder="Jepoyqt">
                    </div>

                    <div class="col mb-4">
                        <label class="form-label" for="type">Username</label>
                        <input class="form-control" type="text" name="type" id="type">
                    </div>

                    <div class="col mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" autocomplete="off">
                    </div>

                    <div class="col mb-5">
                        <label class="form-label" for="confirm-password">Confirm Password</label>
                        <input class="form-control" type="password" name="confirm-password" id="confirm-password">
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