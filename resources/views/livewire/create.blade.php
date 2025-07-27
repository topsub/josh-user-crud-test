<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $user_id ? 'Edit User' : 'Create User' }}</h5>
                <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" wire:model="email">
                        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" wire:model.live="password" placeholder="{{ $user_id ? 'Leave blank to keep current password' : 'Enter your password' }}">
                        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    @if(!$user_id || $password)
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" wire:model="password_confirmation">
                    </div>
                    @endif
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_admin" wire:model="is_admin">
                        <label class="form-check-label" for="is_admin">Is Admin?</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal()">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="store()">
                    <span wire:loading wire:target="store" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span wire:loading wire:target="store">Saving...</span>
                    <span wire:loading.remove wire:target="store">
                        @if($user_id)
                            <i class="bi bi-save"></i> Save Changes
                        @else
                            <i class="bi bi-person-plus-fill"></i> Create User
                        @endif
                    </span>
                </button>
            </div>
        </div>
    </div>
</div> 