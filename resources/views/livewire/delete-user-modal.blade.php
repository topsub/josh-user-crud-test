<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete "{{ $userToDeleteName }}"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" wire:click="destroyUser()">
                    <span wire:loading wire:target="destroyUser" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span wire:loading wire:target="destroyUser">Deleting...</span>
                    <span wire:loading.remove wire:target="destroyUser"><i class="bi bi-trash-fill"></i> Delete</span>
                </button>
            </div>
        </div>
    </div>
</div> 