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

        // Update the status of the notification to 'rejected'
        $notification->update(['status' => 'rejected']);

        // Delete the associated property if it exists
        if ($notification->property_id) {
            $property = Property::find($notification->property_id);
            if ($property) {
                $property->delete();
            }
        }

        // Delete the last stored property if it exists
        $lastProperty = Property::latest()->first();
        if ($lastProperty) {
            $lastProperty->delete();
        }

        // Delete the notification itself
        $notification->delete();

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Notification rejected successfully.');
    }

}
