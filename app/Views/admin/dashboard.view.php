<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/sidebar.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="container-fluid px-4 py-4">
    <!-- Key Metrics Cards -->
    <div class="row g-4 mb-4">
        <!-- Total Patients Card -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="feature-icon-lg bg-primary bg-opacity-10 text-primary rounded-circle me-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <h5 class="card-title text-muted mb-0">Total Patients</h5>
                            <span class="h3 mb-0 font-weight-bold text-primary"><?= $totalPatients ?></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <small class="text-muted">
                            <i class="bi bi-arrow-up text-success me-1"></i>
                            12% increase this month
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Patients Card -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="feature-icon-lg bg-success bg-opacity-10 text-success rounded-circle me-3">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <div>
                            <h5 class="card-title text-muted mb-0">Active Patients</h5>
                            <span class="h3 mb-0 font-weight-bold text-success"><?= $statusCounts['Active'] ?? 0 ?></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <small class="text-muted">
                            <i class="bi bi-clock text-warning me-1"></i>
                            Currently in treatment
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gender Distribution Card -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="feature-icon-lg bg-info bg-opacity-10 text-info rounded-circle me-3">
                            <i class="bi bi-gender-ambiguous"></i>
                        </div>
                        <div>
                            <h5 class="card-title text-muted mb-0">Gender Distribution</h5>
                            <div class="d-flex justify-content-between">
                                <span class="me-3">
                                    <i class="bi bi-gender-male text-primary"></i>
                                    Male: <?= $genderCounts['male'] ?? 0 ?>
                                </span>
                                <span>
                                    <i class="bi bi-gender-female text-pink"></i>
                                    Female: <?= $genderCounts['female'] ?? 0 ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Overview Card -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="feature-icon-lg bg-warning bg-opacity-10 text-warning rounded-circle me-3">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                        <div>
                            <h5 class="card-title text-muted mb-0">Patient Status</h5>
                            <div class="d-flex justify-content-between">
                                <span class="me-3">
                                    <i class="bi bi-check-circle text-success"></i>
                                    Discharged: <?= $statusCounts['Discharged'] ?? 0 ?>
                                </span>
                                <span>
                                    <i class="bi bi-arrow-repeat text-info"></i>
                                    Transferred: <?= $statusCounts['Transferred'] ?? 0 ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Row -->
    <div class="row g-4">
        <!-- Disease Distribution Chart -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-graph-up me-2"></i>Disease Distribution
                    </h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-filter me-1"></i>Filter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Active Cases</a></li>
                            <li><a class="dropdown-item" href="#">Total Cases</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div style="height: 25rem">
                        <canvas id="diseaseDistributionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Patients -->
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-clock-history me-2"></i>Recent Patients
                    </h5>
                    <a href="#" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-eye me-1"></i>View All
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <?php if ($recentPatients->num_rows > 0): ?>
                            <?php while ($patient = $recentPatients->fetch_assoc()): ?>
                                <div class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">
                                                <i class="bi bi-person-circle me-2 text-primary"></i>
                                                <?= htmlspecialchars($patient['first_name'] . ' ' . $patient['last_name']) ?>
                                            </h6>
                                            <small class="text-muted">
                                                <i class="bi bi-journal-medical me-1"></i>
                                                <?= htmlspecialchars($patient['diagnosis']) ?>
                                            </small>
                                        </div>
                                        <div>
                                            <small class="text-muted me-2"><?= date('M d', strtotime($patient['created_at'])) ?></small>
                                            <span class="badge <?= getStatusBadgeClass($patient['status']) ?>"><?= $patient['status'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="list-group-item text-center py-4">
                                <i class="bi bi-inbox-fill text-muted mb-2" style="font-size: 2rem;"></i>
                                <p class="text-muted mb-0">No recent patients</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('diseaseDistributionChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($diagnoses) ?>,
                datasets: [{
                    label: 'Active Patients by Diagnosis',
                    data: <?= json_encode($counts) ?>,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Active Patients'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Diagnosis'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    }
                }
            }
        });
    });
</script>

<?php require 'app/Views/partials/footer.php' ?>