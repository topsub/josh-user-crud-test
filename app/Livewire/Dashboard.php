<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Dashboard extends Component
{
    public function render()
    {
        $recentlyCreatedUsers = User::latest()->take(5)->get();
        $lastLogins = User::whereNotNull('last_login_at')->orderBy('last_login_at', 'desc')->take(5)->get();

        return view('livewire.dashboard', [
            'recentlyCreatedUsers' => $recentlyCreatedUsers,
            'lastLogins' => $lastLogins,
        ]);
    }
}
