<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Service;
use App\Models\User;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard with statistics.
     */
    public function index()
    {
        $stats = [
            'total_users'    => User::where('role', 'user')->count(),
            'total_admins'   => User::where('role', 'admin')->count(),
            'total_services' => Service::count(),
            'unread_contacts'=> ContactSubmission::unread()->count(),
            'revenue'        => '24,500', // Dummy revenue
        ];

        $recent_users    = User::latest()->take(5)->get();
        $recent_contacts = ContactSubmission::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_users', 'recent_contacts'));
    }
}
