<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/sidebar.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="container-fluid p-4">
    <h2>Register Patient Form</h2>
    <form action="" method="POST">
        <div class="row g-3">
            <!-- First Name -->
            <div class="col-sm-6">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <!-- Last Name -->
            <div class="col-sm-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>

            <!-- Age -->
            <div class="col-sm-6">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" min="1" required>
                <div class="invalid-feedback">
                    Valid age is required.
                </div>
            </div>

            <!-- Gender -->
            <div class="col-sm-6">
                <label for="sex" class="form-label">Sex</label>
                <select class="form-select" name="sex" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid gender.
                </div>
            </div>

            <!-- Diagnosis/Disease -->
            <div class="col-12">
                <label for="diagnosis" class="form-label">Diagnosis/Disease</label>
                <input type="text" class="form-control" id="diagnosis" name="diagnosis" required>
                <div class="invalid-feedback">
                    Diagnosis is required.
                </div>
            </div>

            <!-- Prescribed Medication -->
            <div class="col-12">
                <label for="medication" class="form-label">Prescribed Medication</label>
                <input type="text" class="form-control" id="medication" name="medication" required>
                <div class="invalid-feedback">
                    Prescribed medication is required.
                </div>
            </div>

            <!-- Check-up Date -->
            <div class="col-12">
                <label for="checkupDate" class="form-label">Check-up Date</label>
                <input type="date" class="form-control" id="checkupDate" name="checkupDate" required>
                <div class="invalid-feedback">
                    Check-up date is required.
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row mt-4">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit Record</button>
            </div>
        </div>
    </form>
</div>

<?php require 'app/Views/partials/footer.php' ?>