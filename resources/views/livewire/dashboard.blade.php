<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                Recently Created Users
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @forelse($recentlyCreatedUsers as $user)
                        <li class="list-group-item">{{ $user->name }} - {{ $user->created_at->diffForHumans() }}</li>
                    @empty
                        <div class="alert alert-info">
                            No recently created users.
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                Last Logins
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @forelse($lastLogins as $user)
                        <li class="list-group-item">{{ $user->name }} - {{ $user->last_login_at->diffForHumans() }}</li>
                    @empty
                        <div class="alert alert-info">
                            No login data available at this time.
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
