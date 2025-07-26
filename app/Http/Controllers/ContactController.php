<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function getContactData()
    {
        $contacts = \App\Models\Contact::latest()->get();

        $html = '';

        if ($contacts->isEmpty()) {
            $html .= '<tr><td colspan="4" class="text-center">No Data Found</td></tr>';
        } else {
            $i = 1;
            foreach ($contacts as $contact) {
                $html .= '<tr>';
                $html .= '<td>' . $i . '</td>';
                $html .= '<td>' . e($contact->name) . '</td>';
                $html .= '<td>' . e($contact->email) . '</td>';
                $html .= '<td>' . e($contact->message) . '</td>';
                $html .= '<td>';
                if ($contact->image) {
                    $html .= '<img src="' . asset('storage/' . $contact->image) . '" width="60" height="60" alt="Profile Pic">';
                }
                $html .= '</td>';
                $html .= '<td>
                <button class="btn btn-warning edit" data-id="' . $contact->id . '">Edit</button> ||
                <button class="btn btn-danger delete" data-id="' . $contact->id . '">Delete</button>
                </td>';
                $html .= '</tr>';
                $i++;
            }
        }

        return response()->json(['html' => $html]);
    }

    public function getContact($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json(['status' => 'error', 'message' => 'Contact not found'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $contact,
        ]);
    }

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

    public function deleteContact($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found.'], 404);
        }

        // Optionally delete image file
        if ($contact->image && \Storage::disk('public')->exists($contact->image)) {
            \Storage::disk('public')->delete($contact->image);
        }

        $contact->delete();

        return response()->json(['message' => 'Contact deleted successfully.']);
    }
}