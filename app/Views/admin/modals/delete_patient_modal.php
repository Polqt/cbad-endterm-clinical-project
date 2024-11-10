<div class="modal fade" id="deleteModal<?= $patient['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $patient['id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="delete-patient" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel<?= $patient['id'] ?>">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="patient_id" value="<?= $patient['id'] ?>">
                    <p>Are you sure you want to delete patient record for <strong><?= $patient['first_name'] . ' ' . $patient['last_name'] ?></strong>?</p>
                    <p class="text-danger"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>