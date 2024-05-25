<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\Property;

class NotificationController extends Controller
{
    public function index()
    {
        // Retrieve all notifications
        $notifications = Notifications::all();

        return view('admin.notification.index', ['notifications' => $notifications]);
    }

    public function accept($id)
    {
        $notification = Notifications::findOrFail($id);

        // Perform actions for accepting the notification (if any)

        return redirect()->back()->with('success', 'Notification accepted successfully.');
    }

    public function reject($id)
    {
        $notification = Notifications::findOrFail($id);

        $notification->update(['status' => 'rejected']);

        if ($notification->property_id) {
            $property = Property::find($notification->property_id);
            if ($property) {
                $property->delete();
            }
        }

        $notification->delete();

        return redirect()->back()->with('success', 'Notification rejected successfully.');
    }

}
