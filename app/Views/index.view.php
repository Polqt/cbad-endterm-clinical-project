<?php require 'partials/header.php' ?>

    <div class="w-100 h-100 col-12 col-lg-10 col-md-8 d-flex justify-content-center align-items-center text-center">
        <div class="w-25 rounded-4 shadow p-4">
            <p>Don't have an account yet? <a href="register" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Sign up</a></p>
            <form action="" method="post" class="d-flex flex-column gap-4">
                <div class="form-floating">
                    <input class="form-control" id="floatingUsername" type="text" name="username" autocomplete="off" placeholder="Username">
                    <label for="floatingUsername">Username</label>
                </div>
                <div class="form-floating mb-2">
                    <input class="form-control" id="floatingPassword" type="password" name="password" autocomplete="new-password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" name="submit-btn" id="submit-btn" class="w-100 btn btn-primary" onclick="redirectLink()">Sign in</button>
            </form>
        </div>
    </div>

<?php require 'partials/footer.php' ?>