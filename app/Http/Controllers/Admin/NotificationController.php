<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifications;

class NotificationController extends Controller
{
    public function index()
{
    $notifications = Notifications::all(); 

    return view('admin.notification.index', ['notifications' => $notifications]);
}
}
