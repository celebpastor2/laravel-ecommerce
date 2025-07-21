<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;

class FormController extends Controller
{
    //
    public function ContactForm(Request $request){
        $name = $request->input("name");
        $email = $request->input("email");
        $message = $request->input("message");
        ContactForm::create([
            'name'  => $name,
            'email' => $email,
            'message' => $message
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Contact Form Saved Successfully'
        ]);
    }

    public function ContactFormRender(Request $request){
        return view('contact');
    }

    public function ViewForm(Request $request){
        $forms = ContactForm::all();//array of entries 
        return view('contactView', [
            'forms' => $forms
        ]);
    }
}
