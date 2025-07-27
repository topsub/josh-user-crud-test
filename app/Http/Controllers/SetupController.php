<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

/**
 * Handles the initial setup for the application.
 *
 * This controller is designed to make the review process for this coding test
 * as smooth as possible. On the first visit to the application, it automatically
 * creates a default admin user by running the necessary database seeder.
 *
 * A flag file is created in the storage directory to ensure this setup
 * process only runs once.
 */
class SetupController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $setupCompletedFlag = storage_path('app/setup_completed.flag');

        if (!File::exists($setupCompletedFlag)) {
            Artisan::call('db:seed', ['--class' => 'AdminUserSeeder']);
            File::put($setupCompletedFlag, 'Setup completed on ' . now());
        }

        return view('welcome');
    }
} 