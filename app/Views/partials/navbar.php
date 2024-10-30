<header class="w-100 col-12 col-lg-10 col-md-8 p-2 position-fixed shadow-sm">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-end">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                
            </a>

            <div class="d-flex gap-3">
                <!-- <a href="">
                    <button type="button" class="btn btn-outline-primary">Login</button>
                </a>
                <a href="">
                    <button type="button" class="btn btn-outline-primary">Sign-up</button>
                </a> -->
                <div class="dropdown">
                    <button class="btn border rounded-pill btn-dark d-flex align-items-center gap-1 dropdown-toggle px-3 py-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= $user_logo ?>" alt="manager" width="25">
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                        <li><a class="dropdown-item" href="#"></a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>