<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/sidebar.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <h2 class="mb-0">Patient Registration</h2>
                    </div>
                </div>

                <div class="card-body p-4">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($error) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= BASE_URL ?>/admin/register-patient" method="POST" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <!-- First Name -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                                    <label for="firstName">First Name</label>
                                    <div class="invalid-feedback">
                                        Please provide a first name.
                                    </div>
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                                    <label for="lastName">Last Name</label>
                                    <div class="invalid-feedback">
                                        Please provide a last name.
                                    </div>
                                </div>
                            </div>

                            <!-- Age -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="age" name="age" placeholder="Age" min="1" required>
                                    <label for="age">Age</label>
                                    <div class="invalid-feedback">
                                        Please provide a valid age.
                                    </div>
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="sex" name="sex" required>
                                        <option value="" disabled selected>Choose Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <label for="sex">Gender</label>
                                    <div class="invalid-feedback">
                                        Please select a gender.
                                    </div>
                                </div>
                            </div>

                            <!-- Diagnosis -->
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="diagnosis" name="diagnosis" placeholder="Diagnosis/Disease" required>
                                    <label for="diagnosis">Diagnosis/Disease</label>
                                    <div class="invalid-feedback">
                                        Please provide a diagnosis.
                                    </div>
                                </div>
                            </div>

                            <!-- Medication -->
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="medication" name="medication" placeholder="Prescribed Medication" required>
                                    <label for="medication">Prescribed Medication</label>
                                    <div class="invalid-feedback">
                                        Please provide prescribed medication.
                                    </div>
                                </div>
                            </div>

                            <!-- Check-up Date -->
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="checkupDate" name="checkupDate" required>
                                    <label for="checkupDate">Check-up Date</label>
                                    <div class="invalid-feedback">
                                        Please select a check-up date.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3">Submit Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'app/Views/partials/footer.php' ?>