<!-- Modal Edit -->
<div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBrandModalLabel">Edit Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editBrandForm">
                    <input type="hidden" id="editBrandId">
                    <div class="mb-3">
                        <label for="editBrandName" class="form-label">Nama Brand</label>
                        <input type="text" class="form-control" id="editBrandName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBrandCode" class="form-label">Kode Brand</label>
                        <input type="text" class="form-control" id="editBrandCode" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>