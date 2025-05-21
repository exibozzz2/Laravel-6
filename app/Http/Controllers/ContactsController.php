<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddContactRequest;
use App\Models\ContactsModel;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function getAllContacts() {
        $allContacts = ContactsModel::all();
        return view('allContacts', compact('allContacts'));
    }


    public function addContact(AddContactRequest $request) {


        ContactsModel::create([
            'name' => $request->get('name'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);

        return redirect('/add-contact');
    }

    public function delete(ContactsModel $contact) {

        $contact->delete();
        return redirect()->back();

    }

    public function viewSingleContact(ContactsModel $contact) {

        return view('editContact', compact('contact'));

    }

    public function update(Request $request, ContactsModel $contact) {


        $contact->name = $request->get('name');
        $contact->subject = $request->get('subject');
        $contact->message = $request->get('message');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->save();

        return redirect('/all-contacts');

    }
}
