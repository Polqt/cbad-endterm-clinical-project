<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/sidebar.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="container-fluid p-4">
    <div class="d-flex justify-content-end align-items-end flex-column gap-3">
        <form action="" method="POST" role="search">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Diagnosis</th>
                    <th scope="col">Prescribed Medication</th>
                    <th scope="col">Check-up Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require 'app/Views/partials/footer.php' ?>