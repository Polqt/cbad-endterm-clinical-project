<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/sidebar.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="container-fluid p-4 d-flex flex-column" style="height: 42rem;">
    <?php if (isset($success)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $success ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card flex-grow-1 d-flex flex-column">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Patient Records</h2>
            <div class="d-flex gap-3">
        <form action="" method="POST" class="d-flex gap-2" role="search">
                    <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Search" value="<?= htmlspecialchars($search ?? '') ?>">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <a href="<?= BASE_URL ?>/admin/register-patient" class="btn btn-success">
                    <i class="fas fa-plus"></i> New Patient
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-info">
                        <tr>
                            <!-- <th scope="col tabled-hover">ID</th> -->
                            <th scope="col tabled-hover">Name</th>
                            <th scope="col table-hover">Age</th>
                            <th scope="col table-hover">Gender</th>
                            <th scope="col table-hover">Diagnosis</th>
                            <th scope="col table-hover">Prescribed Medication</th>
                            <th scope="col table-hover">Check-up Date</th>
                            <th scope="col table-hover">Status</th>
                            <th scope="col table-hover">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($patients) && !empty($patients)): ?>
                            <?php foreach ($patients as $patient): ?>
                                <tr>
                                    <!-- <th scope="row"><?= $patient['id'] ?></th> -->
                                    <td>
                                        <?= $patient['first_name'] . ' ' . $patient['last_name'] ?>
                                    </td>
                                    <td><?= $patient['age'] ?></td>
                                    <td><?= ucfirst($patient['gender']) ?></td>
                                    <td><?= $patient['diagnosis'] ?></td>
                                    <td><?= $patient['prescribed_medication'] ?></td>
                                    <td><?= date('M d, Y', strtotime($patient['checkup_date'])) ?></td>
                                    <td>
                                        <span class="badge d-flex justify-content-center align-items-center <?= getStatusBadgeClass($patient['status']) ?>">
                                            <?= $patient['status'] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-around gap-1">
                                            <!-- View Button -->
                                            <button type="button" class="btn btn-info btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#viewModal<?= $patient['id'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                </svg>
                                            </button>

                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal<?= $patient['id'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                </svg>
                                            </button>
                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal<?= $patient['id'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- View Modal -->
                                <?php include 'app/Views/admin/modals/view_patient_modal.php'; ?>

                                <!-- Edit Modal -->
                                <?php include 'app/Views/admin/modals/edit_patient_modal.php'; ?>

                                <!-- Delete Modal -->
                                <?php include 'app/Views/admin/modals/delete_patient_modal.php'; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-center">No patients found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
function getStatusBadgeClass($status)
{
    return match ($status) {
        'Active' => 'bg-success',
        'Discharged' => 'bg-warning',
        'Deceased' => 'bg-danger',
        'Transferred' => 'bg-info',
        default => 'bg-secondary'
    };
}
?>

<?php require 'app/Views/partials/footer.php' ?>