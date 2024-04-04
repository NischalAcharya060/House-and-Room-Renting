<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $contactMessages = ContactMessage::latest()->get();
        return view('admin.contact.index', compact('contactMessages'));
    }
}
