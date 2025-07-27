<section>
    <header>
        <h2>
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit.prevent="updateProfileInformation" class="mt-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input wire:model.defer="name" id="name" name="name" type="text" class="form-control">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input wire:model.defer="email" id="email" name="email" type="email" class="form-control">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
</section>
