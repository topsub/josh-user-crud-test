@extends('layouts.app')

@section('slot')
    <div class="container mt-5">
        @livewire('user-crud')
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('livewire:init', () => {
        let modal = new bootstrap.Modal(document.getElementById('userModal'));

        Livewire.on('open-modal', () => {
            modal.show();
        });

        Livewire.on('close-modal', () => {
            modal.hide();
        });
    });
</script>
@endpush 