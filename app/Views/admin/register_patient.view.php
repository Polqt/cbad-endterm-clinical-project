<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/sidebar.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="container-fluid p-4">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h2 class="mb-0">Register Patient</h2>
        </div>

        <div class="card-body">
            <form action="<?= BASE_URL ?>/admin/register-patient" method="POST">
                <div class="row g-3">
                    <!-- First Name -->
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>

                    <!-- Last Name -->
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>

                    <!-- Age -->
                    <div class="col-sm-6">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" min="1" required>
                    </div>

                    <!-- Gender -->
                    <div class="col-sm-6">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-select" id="sex" name="sex" required>
                            <option value="" disabled selected>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <!-- Diagnosis/Disease -->
                    <div class="col-12">
                        <label for="diagnosis" class="form-label">Diagnosis/Disease</label>
                        <input type="text" class="form-control" id="diagnosis" name="diagnosis" required>
                    </div>

                    <!-- Prescribed Medication -->
                    <div class="col-12">
                        <label for="medication" class="form-label">Prescribed Medication</label>
                        <input type="text" class="form-control" id="medication" name="medication" required>
                    </div>

                    <!-- Check-up Date -->
                    <div class="col-12">
                        <label for="checkupDate" class="form-label">Check-up Date</label>
                        <input type="date" class="form-control" id="checkupDate" name="checkupDate" required>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit Record</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'app/Views/partials/footer.php' ?>
