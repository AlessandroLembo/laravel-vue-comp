<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'email' => 'bail|required|email',
                'subject' => 'bail|required|string',
                'message' => 'bail|required|string',
                'subscription' => 'bail|nullable|boolean',
            ],
            [
                'email.required' => 'La mail è obbligatoria',
                'email.email' => 'La mail non è valida',
                'subject.required' => 'Il soggetto deve avere un oggetto',
                'message.required' => 'Il messaggio deve avere un contenuto',
                'subscription.boolean' => 'Il valore del checkbox non è valido',

            ]
        );


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        if (Arr::exists($data, 'subscription') && $data['subscription']) {
            $exists = Contact::where('email', $data['email'])->count();
            if (!$exists) {

                $contact = new Contact();
                $contact->email = $data['email'];
                $contact->save();
            }
        }

        //Invio la mail
        $mail = new ContactMessageMail($data['email'], $data['subject'], $data['message']);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send($mail);
        return response(null, 204);
    }
}
