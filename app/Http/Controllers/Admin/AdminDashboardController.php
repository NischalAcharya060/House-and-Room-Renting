<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userCount = User::count();
        $rentingCount = Rental::count();
        $propertyCount = Property::count();

        $userCounts = User::select('user_type', DB::raw('count(*) as count'))
            ->groupBy('user_type')
            ->pluck('count', 'user_type');
        return view('admin.dashboard', compact('user', 'userCount', 'userCounts', 'rentingCount', 'propertyCount'));
    }

    public function notifications()
    {
        $notifications = Notification::with('property.user')->where('is_read', false)->get();
        $unreadNotificationCount = Notification::where('is_read', false)->count();

        return view('admin.notifications.index', compact('notifications', 'unreadNotificationCount'));
    }

    public function markAsRead(Notification $notification)
    {
        $notification->update(['is_read' => true]);
        return redirect()->route('admin.notifications.index');
    }
}

