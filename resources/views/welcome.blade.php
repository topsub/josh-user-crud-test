@extends('layouts.app')

@section('slot')
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Welcome to the User Management System</h1>
                <p class="lead">A demonstration project.</p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="bi bi-person-check-fill"></i> Testing Instructions</h4>
                    </div>
                    <div class="card-body">
                        <p>To test the user management system, please log in with the following admin credentials:</p>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Email:</strong>
                                    <span id="email-to-copy">admin@example.com</span>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary" onclick="copyToClipboard('email-to-copy', this)">
                                    <i class="bi bi-clipboard"></i>
                                </button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Password:</strong>
                                    <span id="password-to-copy">123qwe</span>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary" onclick="copyToClipboard('password-to-copy', this)">
                                    <i class="bi bi-clipboard"></i>
                                </button>
                            </li>
                        </ul>
                        <p class="mt-3">Once logged in as the admin, you will see a "Users" link in the navigation bar. Click this link to access the user management page.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="bi bi-list-check"></i> System Features</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">User Registration & Login</li>
                            <li class="list-group-item">User Management CRUD (Create, Read, Update, Delete)</li>
                            <li class="list-group-item">Admin & User Roles</li>
                            <li class="list-group-item">Livewire Components for Dynamic UI</li>
                            <li class="list-group-item">Bootstrap 5.3 for a Modern, Responsive Design</li>
                            <li class="list-group-item">Mobile Friendly</li>
                            <li class="list-group-item">Automated Admin User Creation</li>
                            <li class="list-group-item">Last Login Tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function copyToClipboard(elementId, button) {
        const text = document.getElementById(elementId).innerText;
        navigator.clipboard.writeText(text).then(() => {
            const originalHtml = button.innerHTML;
            button.innerHTML = 'Copied!';
            setTimeout(() => {
                button.innerHTML = originalHtml;
            }, 2000);
        });
    }
</script>
@endpush
