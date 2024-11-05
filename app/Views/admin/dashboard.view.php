<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/sidebar.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="container-fluid p-4">
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
                <?php foreach ($variable as $key => $value) {
                    # code...
                } ?>
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

<?php require 'app/Views/partials/footer.php' ?>