import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

document.addEventListener('livewire:initialized', () => {
    const userModalElement = document.getElementById('userModal');
    if (userModalElement) {
        const userModal = new bootstrap.Modal(userModalElement);

        Livewire.on('open-modal', () => {
            userModal.show();
        });

        Livewire.on('close-modal', () => {
            userModal.hide();
        });
    }

    const deleteUserModalElement = document.getElementById('deleteUserModal');
    if (deleteUserModalElement) {
        const deleteUserModal = new bootstrap.Modal(deleteUserModalElement);

        Livewire.on('open-delete-modal', () => {
            deleteUserModal.show();
        });

        Livewire.on('close-delete-modal', () => {
            deleteUserModal.hide();
        });
    }
});
