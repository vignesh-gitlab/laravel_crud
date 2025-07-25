<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'image'   => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'message' => 'required|string',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        // Store in DB
        Contact::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'image'   => $imagePath,
            'message' => $validated['message'],
        ]);

        return response()->json(['status' => 'success', 'message' => 'Contact saved successfully!']);
    }
}