<?php require 'app/Views/partials/header.php' ?>
<?php require 'app/Views/partials/sidebar.php' ?>
<?php require 'app/Views/partials/navbar.php' ?>

<div class="container-fluid px-4 py-5 bg-light-subtle">
    <div class="row mb-4 align-items-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-6 text-dark fw-bold mb-0">Dashboard Overview</h1>
            </div>
        </div>
    </div>

    <!-- Dashboard Metrics Grid -->
    <div class="row g-4 mb-5">
        <!-- Total Patients -->
        <div class="col-12 col-md-6 col-md-3">
            <div class="card card-metric border-0 shadow-sm h-100 overflow-hidden">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Total Patients</h5>
                </div>
                <div class="card-body d-flex align-items-center">
                    <div class="bg-primary rounded-circle p-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-people text-primary" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="h4 mb-1 fw-bold text-dark"><?= $totalPatients ?></h3>
                        <p class="text-muted mb-0">Total Patients</p>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 d-flex justify-content-between align-items-center py-2 px-3">
                    <small class="text-primary">Registered</small>
                    <i class="bi bi-graph-up-arrow text-success"></i>
                </div>
            </div>
        </div>
        <!-- Active Patients -->
        <div class="col-12 col-md-6 col-md-3">
            <div class="card card-metric border-0 shadow-sm h-100 overflow-hidden">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Active Patients</h5>
                </div>
                <div class="card-body d-flex align-items-center">
                    <div class="bg-success rounded-circle p-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-person-check text-success" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="h4 mb-1 fw-bold text-dark"><?= $statusCounts['Active'] ?? 0 ?></h3>
                        <p class="text-muted mb-0">Active Patients</p>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 d-flex justify-content-between align-items-center py-2 px-3">
                    <small class="text-success">In Treatment</small>
                    <i class="bi bi-plus-circle text-success"></i>
                </div>
            </div>
        </div>

        <!-- Gender Distribution -->
        <div class="col-12 col-md-6 col-sm-3">
            <div class="card card-metric border-0 shadow-sm h-100 overflow-hidden">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Gender Distribution</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <div class="p-3 bg-primary-soft rounded mb-3">
                                <div class="d-flex justify-content-center mb-2">
                                    <div class="rounded-circle bg-primary text-white p-3 d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" class="bi bi-gender-male">
                                            <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8" />
                                        </svg>
                                    </div>
                                </div>
                                <h6 class="mb-1 fw-bold">Male</h6>
                                <div class="h4 mb-0 text-primary"><?= $genderCounts['male'] ?></div>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="p-3 bg-pink-soft rounded mb-3">
                                <div class="d-flex justify-content-center mb-2">
                                    <div class="rounded-circle badge-pink text-white p-3 d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" class="bi bi-gender-female">
                                            <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8M3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5" />
                                        </svg>
                                    </div>
                                </div>
                                <h6 class="mb-1 fw-bold">Female</h6>
                                <div class="h4 mb-0 text-pink"><?= $genderCounts['female'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-primary" role="progressbar"
                            style="width: <?= $genderCounts['male'] > 0 ? ($genderCounts['male'] / ($genderCounts['male'] + $genderCounts['female']) * 100) : 0 ?>%">
                        </div>
                        <div class="progress-bar badge-pink" role="progressbar"
                            style="width: <?= $genderCounts['female'] > 0 ? ($genderCounts['female'] / ($genderCounts['male'] + $genderCounts['female']) * 100) : 0 ?>%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Patient Status -->
        <div class="col-12 col-md-6 col-md-3">
            <div class="card card-metric border-0 shadow-sm h-100 overflow-hidden">
                <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Patient Status</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center bg-success-soft p-3 rounded">
                                <div class="rounded-circle bg-success text-white p-2 me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="fw-bold d-block">Active</span>
                                    <span class="badge bg-success text-white"><?= $statusCounts['Active'] ?? 0 ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center bg-warning-soft p-3 rounded">
                                <div class="rounded-circle bg-warning text-white p-2 me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="fw-bold d-block">Discharged</span>
                                    <span class="badge bg-warning text-white"><?= $statusCounts['Discharged'] ?? 0 ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center bg-danger-soft p-3 rounded">
                                <div class="rounded-circle bg-danger text-white p-2 me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z" />
                                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="fw-bold d-block">Deceased</span>
                                    <span class="badge bg-danger text-white"><?= $statusCounts['Deceased'] ?? 0 ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center bg-info-soft p-3 rounded">
                                <div class="rounded-circle bg-info text-white p-2 me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="fw-bold d-block">Transferred</span>
                                    <span class="badge bg-info text-white"><?= $statusCounts['Transferred'] ?? 0 ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 10px;">
                        <?php
                        $totalPatients = array_sum($statusCounts);
                        $statuses = ['Active', 'Discharged', 'Deceased', 'Transferred'];
                        $colors = ['success', 'warning', 'danger', 'info'];

                        foreach ($statuses as $index => $status) {
                            $count = $statusCounts[$status] ?? 0;
                            $percentage = $totalPatients > 0 ? ($count / $totalPatients * 100) : 0;
                        ?>
                            <div class="progress-bar bg-<?= $colors[$index] ?>" role="progressbar" style="width: <?= number_format($percentage, 2) ?>%"></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row g-4">
            <!-- Disease Distribution Chart -->
            <div class="col-12 col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title mb-0 text-dark fw-bold">
                            <i class="bi bi-activity me-2 text-primary"></i>Disease Distribution
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container position-relative" style="height: 25rem">
                            <canvas id="diseasePieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Patients -->
            <div class="col-12 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title mb-0 text-dark fw-bold">
                            <i class="bi bi-clock-history me-2 text-primary"></i>Recent Patients
                        </h5>
                        <a href="<?= BASE_URL ?>/admin/patient-records" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <?php if ($recentPatients->num_rows > 0): ?>
                                <?php while ($patient = $recentPatients->fetch_assoc()): ?>
                                    <div class="list-group-item list-group-item-action px-4 py-3">
                                        <div class="d-flex w-100 justify-content-between mb-2">
                                            <h6 class="mb-0 fw-bold"><?= htmlspecialchars($patient['first_name'] . ' ' . $patient['last_name']) ?></h6>
                                            <small class="text-muted"><?= date('M d, Y', strtotime($patient['created_at'])) ?></small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted text-truncate"><?= htmlspecialchars($patient['diagnosis']) ?></span>
                                            <span class="badge rounded-pill <?= getStatusBadgeClass($patient['status']) ?>"><?= $patient['status'] ?></span>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="list-group-item text-center py-4">
                                    <p class="text-muted mb-0">No recent patients</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const pieCtx = document.getElementById('diseasePieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: <?= json_encode($diagnoses) ?>,
                datasets: [{
                    data: <?= json_encode($counts) ?>,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(199, 199, 199, 0.7)',
                        'rgba(83, 102, 255, 0.7)',
                        'rgba(40, 159, 64, 0.7)',
                        'rgba(210, 99, 132, 0.7)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(199, 199, 199, 1)',
                        'rgba(83, 102, 255, 1)',
                        'rgba(40, 159, 64, 1)',
                        'rgba(210, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 20,
                        }
                    },
                    title: {
                        display: true,
                        text: 'Active Patients by Diagnosis',
                    }
                }
            }
        });
    });
</script>

<?php require 'app/Views/partials/footer.php' ?>