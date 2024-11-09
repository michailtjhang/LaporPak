<?php

namespace App\Providers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class NotificationProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('system.layouts.app', function ($view) {
            $role = Auth::user()->role->name;
            $userId = Auth::user()->id;
            $allowedRoles = ['Manager', 'Verified']; // Roles that can see both "created" and "updated" activities

            // Define activity types based on user role
            if (in_array($role, $allowedRoles)) {
                // Manager and Verified roles can see all "created" activities
                $activityDescriptions = ['created'];
            } else {
                // Other roles can only see "updated" activities for their own reports
                $activityDescriptions = ['updated'];
            }

            // Retrieve the activities with the specified descriptions, ordered by the latest and limited to 4
            $activitiesQuery = Activity::whereIn('description', $activityDescriptions)
                ->where('log_name', 'aduan')
                ->orderBy('created_at', 'desc') // Order by newest first
                ->limit(4); // Limit to the latest 4 activities

            // If the user is not a Manager or Verified, restrict activities to those created by the user
            if (!in_array($role, $allowedRoles)) {
                $activitiesQuery->where('causer_id', $userId);
            }

            $activities = $activitiesQuery->get(['causer_id', 'created_at', 'description']);

            // Calculate the notification count
            $count = $activities->count();

            // Get unique user IDs from the activities and retrieve user details
            $userIds = $activities->pluck('causer_id')->unique()->toArray();
            $users = User::whereIn('id', $userIds)
                ->get(['id', 'fullname'])
                ->map(function ($user) use ($activities) {
                    // Attach each user's relevant activities with message and time details
                    $user->activities = $activities->where('causer_id', $user->id)->map(function ($activity) {
                        $activity->message = $activity->description == 'created'
                            ? 'Ada laporan Aduan baru!'
                            : 'Laporan Aduan anda telah diupdate!';
                        $activity->time = $activity->created_at;
                        return $activity;
                    });
                    return $user;
                });

            // Pass data to the view
            $view->with('users', $users);
            $view->with('count', $count); // Pass the count to the view
        });
    }
}
