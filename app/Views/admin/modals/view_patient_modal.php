<div class="modal fade " id="viewModal<?= $patient['id'] ?>" tabindex="-1" aria-labelledby="viewModalLabel<?= $patient['id'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel<?= $patient['id'] ?>">Patient Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <?= $patient['first_name'] . ' ' . $patient['last_name'] ?></p>
                        <p><strong>Age:</strong> <?= $patient['age'] ?></p>
                        <p><strong>Gender:</strong> <?= ucfirst($patient['gender']) ?></p>
                        <p><strong>Status:</strong>
                            <span class="badge <?= getStatusBadgeClass($patient['status']) ?>">
                                <?= $patient['status'] ?>
                            </span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Check-up Date:</strong> <?= date('M d, Y', strtotime($patient['checkup_date'])) ?></p>
                        <p><strong>Created:</strong> <?= date('M d, Y', strtotime($patient['created_at'])) ?></p>
                        <p><strong>Last Updated:</strong> <?= date('M d, Y', strtotime($patient['updated_at'])) ?></p>
                    </div>
                    <div class="col-12">
                        <p><strong>Diagnosis:</strong></p>
                        <p class="text-muted"><?= nl2br(htmlspecialchars($patient['diagnosis'])) ?></p>
                    </div>
                    <div class="col-12">
                        <p><strong>Prescribed Medication:</strong></p>
                        <p class="text-muted"><?= nl2br(htmlspecialchars($patient['prescribed_medication'])) ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

