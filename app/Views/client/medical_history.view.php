<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/sidebar.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="container-fluid p-4 d-flex flex-column" style="height: 42rem;">
    <div class="card flex-grow-1">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">My Medical History</h2>
            <form action="" method="POST" class="d-flex gap-2" role="search">
                <input type="search" name="search" class="form-control" placeholder="Search records..."
                    aria-label="Search" value="<?= htmlspecialchars($search ?? '') ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Check-up Date</th>
                            <th scope="col">Diagnosis</th>
                            <th scope="col">Prescribed Medication</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($records)): ?>
                            <?php foreach ($records as $record): ?>
                                <tr>
                                    <td><?= date('M d, Y', strtotime($record['checkup_date'])) ?></td>
                                    <td><?= htmlspecialchars($record['diagnosis']) ?></td>
                                    <td><?= htmlspecialchars($record['prescribed_medication']) ?></td>
                                    <td>
                                        <span class="badge d-flex justify-content-center align-items-center <?= getStatusBadgeClass($record['status']) ?>">
                                            <?= htmlspecialchars($record['status']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">
                                    <div class="alert alert-info">
                                        <?php
                                        if (!empty($search)) {
                                            echo "No records found matching your search: " . htmlspecialchars($search);
                                        } else {
                                            echo "No medical records found for this user.";
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require 'app/Views/partials/footer.php' ?>