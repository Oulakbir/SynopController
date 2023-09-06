<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactFormSubmission;
use Exception;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
class ContactFormController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Create a new contact form submission record in the database
        ContactFormSubmission::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        // You can add any additional logic or redirect to a success page here
        // For now, let's redirect back to the form with a success message
        return redirect()->back()->with('success', 'Message submitted successfully!');
    }
    public function index()
    {
        $Comments = ContactFormSubmission::all();
        //dd(ContactFormSubmission::all());
        return view('commentsTable', compact('Comments'));
    }

    public function destroy(Request $request)
    {
       
        try {

            ContactFormSubmission::destroy($request->id);
            Toastr::success('Comment deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (Exception $e) {

            DB::rollback();
            Toastr::error('Comment delete fail :)', 'Error');
            return redirect()->back();
        }
    }
}
