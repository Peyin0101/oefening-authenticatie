<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormSubmitted;
use App\Mail\ContactFormConfirmation;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function handle(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'department' => 'required',
            'message' => 'required|min:20',
            'cookie_policy' => 'accepted',
        ]);

        Mail::to('admin@example.com')->send(new ContactFormSubmitted($validatedData));
        Mail::to($validatedData['email'])->send(new ContactFormConfirmation($validatedData));

        return redirect()->back()->with('success', true);
    }
}