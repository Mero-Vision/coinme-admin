<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function publicIndex(){
        return view('contact');
    }

    public function adminIndex(){
        return view('admin.contact_us');
    }

    public function contactDataAjax()
    {
        $user = ContactUs::latest()->get();
        return response()->json(['data' => $user]);
    }

    public function deleteContact($id)
    {
        $contact = ContactUs::find($id);

        if ($contact) {
            $contact->delete();
            return response()->json(['status' => 'success', 'message' => 'Contact Message deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Contact Not Found!']);
        }
    }
}