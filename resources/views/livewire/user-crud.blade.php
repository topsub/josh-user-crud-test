<div>
    <div class="row">
        <div class="col">
            <h3>User Management</h3>
        </div>
        <div class="col text-end">
            <button class="btn btn-primary" wire:click="create()"><i class="bi bi-person-plus-fill"></i> Create User</button>
        </div>
    </div>

    @include('livewire.create')
    @include('livewire.delete-user-modal')

    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
          {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" style="margin-top:30px;">
          {{ session('error') }}
        </div>
    @endif

    <div class="d-none d-md-block">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-primary">
                                <span wire:loading wire:target="edit({{ $user->id }})" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span wire:loading.remove wire:target="edit({{ $user->id }})"><i class="bi bi-pencil-fill"></i> Edit</span>
                            </button>
                            <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-danger" {{ $user->id == auth()->id() ? 'disabled' : '' }}>
                                <span wire:loading wire:target="delete({{ $user->id }})" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span wire:loading.remove wire:target="delete({{ $user->id }})"><i class="bi bi-trash-fill"></i> Delete</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-block d-md-none">
        @foreach($users as $user)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">{{ $user->email }}</p>
                    <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-primary">
                        <span wire:loading wire:target="edit({{ $user->id }})" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span wire:loading.remove wire:target="edit({{ $user->id }})"><i class="bi bi-pencil-fill"></i> Edit</span>
                    </button>
                    <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-danger" {{ $user->id == auth()->id() ? 'disabled' : '' }}>
                        <span wire:loading wire:target="delete({{ $user->id }})" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span wire:loading.remove wire:target="delete({{ $user->id }})"><i class="bi bi-trash-fill"></i> Delete</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>


    {{ $users->links() }}
</div>
