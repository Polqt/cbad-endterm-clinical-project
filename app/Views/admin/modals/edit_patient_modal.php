<div class="modal fade" id="editModal<?= $patient['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $patient['id'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= BASE_URL ?>/admin/update-patient" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel<?= $patient['id'] ?>">Edit Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="patient_id" value="<?= $patient['id'] ?>">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName<?= $patient['id'] ?>" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName<?= $patient['id'] ?>"
                                name="firstName" value="<?= htmlspecialchars($patient['first_name']) ?>"
                                data-original-value="<?= htmlspecialchars($patient['first_name']) ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label for="lastName<?= $patient['id'] ?>" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName<?= $patient['id'] ?>"
                                name="lastName" value="<?= htmlspecialchars($patient['last_name']) ?>"
                                data-original-value="<?= htmlspecialchars($patient['last_name']) ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label for="age<?= $patient['id'] ?>" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age<?= $patient['id'] ?>"
                                name="age" value="<?= htmlspecialchars($patient['age']) ?>"
                                data-original-value="<?= htmlspecialchars($patient['age']) ?>" required min="1">
                        </div>

                        <div class="col-md-4">
                            <label for="sex<?= $patient['id'] ?>" class="form-label">Gender</label>
                            <select class="form-select" id="sex<?= $patient['id'] ?>" name="sex" required>
                                <option value="male" <?= $patient['gender'] === 'male' ? 'selected' : '' ?>>Male</option>
                                <option value="female" <?= $patient['gender'] === 'female' ? 'selected' : '' ?>>Female</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="status<?= $patient['id'] ?>" class="form-label">Status</label>
                            <select class="form-select" id="status<?= $patient['id'] ?>" name="status" data-original-value="<?= $patient['status'] ?>" required>
                                <option value="Active" <?= $patient['status'] === 'Active' ? 'selected' : '' ?>>Active</option>
                                <option value="Discharged" <?= $patient['status'] === 'Discharged' ? 'selected' : '' ?>>Discharged</option>
                                <option value="Deceased" <?= $patient['status'] === 'Deceased' ? 'selected' : '' ?>>Deceased</option>
                                <option value="Transferred" <?= $patient['status'] === 'Transferred' ? 'selected' : '' ?>>Transferred</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="diagnosis<?= $patient['id'] ?>" class="form-label">Diagnosis</label>
                            <textarea class="form-control" id="diagnosis<?= $patient['id'] ?>"
                                name="diagnosis" rows="3"
                                data-original-value="<?= htmlspecialchars($patient['diagnosis']) ?>" required>
                            </textarea>
                        </div>

                        <div class="col-12">
                            <label for="medication<?= $patient['id'] ?>" class="form-label">Prescribed Medication</label>
                            <textarea class="form-control" id="medication<?= $patient['id'] ?>"
                                name="medication" rows="3"
                                data-original-value="<?= htmlspecialchars($patient['prescribed_medication']) ?>" required>
                            </textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="checkupDate<?= $patient['id'] ?>" class="form-label">Check-up Date</label>
                            <input type="date" class="form-control" id="checkupDate<?= $patient['id'] ?>"
                                name="checkupDate" value="<?= $patient['checkup_date'] ?>"
                                data-original-value="<?= htmlspecialchars($patient['checkup_date']) ?>" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>