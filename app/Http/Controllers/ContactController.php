<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyMail;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view("dashbord.layout.Contact_Crud.index", compact("contacts"));
    }

    public function create()
    {
        return view("public.layout.contact");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return view("public.layout.contact");
    }

    public function show(Contact $contact)
    {

    }

    public function edit(Contact $contact)
    {
        // يمكنك إضافة منطق لتحرير تفاصيل الاتصال إذا كنت ترغب في ذلك
    }

    public function update(Request $request, Contact $contact)
{

    $request->validate([
        'reply_message' => 'required|string',
    ]);


    $contact->update([
        'reply_message' => $request->reply_message,
        'status' => 'replied',
    ]);


    try {

        Mail::to($contact->email)
            ->send(new ReplyMail($contact, $request->reply_message));

        return redirect()->route('contacts.index')->with('success', 'Reply sent and email delivered!');
    } catch (\Exception $e) {
        return redirect()->route('contacts.index')->with('error', 'Failed to send reply email. Error: ' . $e->getMessage());
    }
}

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
