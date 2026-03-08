<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function showForm()
    {
        return view('register');
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|min:3|max:100',
            'email'     => 'required|email',
            'age'       => 'required|integer|min:18|max:100',
            'course'    => 'required'
        ]);

        $registration = Registration::create($validated);

        return view('success', [
            'full_name' => $registration->full_name,
            'email'     => $registration->email,
            'age'       => $registration->age,
            'course'    => $registration->course,
        ]);
    }

    public function index()
    {
        $registrations = Registration::latest()->get();
        return view('registrations', compact('registrations'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name' => 'required|min:3|max:100',
            'email'     => 'required|email',
            'age'       => 'required|integer|min:18|max:100',
            'course'    => 'required'
        ]);

        $registration = Registration::findOrFail($id);
        $registration->update($validated);

        return redirect()->route('registrations')->with('success', 'Registration updated!');
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('registrations')->with('success', 'Registration deleted!');
    }
}