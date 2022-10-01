<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function index() {
        $contacts = Contact::all(['id', 'name', 'email']);

        return response()->json($contacts);
    }

    public function show($id) {
        $contact = Contact::select(['id', 'name', 'email', 'created_at'])->find($id);

        if(!$contact) {
            return response()->json([
                'message' => 'Contact does not exist.'
            ], 404);
        }

        return response()->json($contact);
    }
}
