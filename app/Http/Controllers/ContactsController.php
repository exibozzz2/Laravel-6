<?php

namespace App\Http\Controllers;

use App\Models\ContactsModel;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function getAllContacts() {
        $allContacts = ContactsModel::all();
        return view('allContacts', compact('allContacts'));
    }


    public function addContact(Request $request) {

        $request->validate([
            'name' => 'string|required|min:4',
            'subject' => 'string|required|min:4|max:256',
            'message' => 'string|required|min:10|max:2000',
            'email' => 'string|required|max:256',
            'phone' => 'integer|required',
        ]);

        ContactsModel::create([
            'name' => $request->get('name'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);

        return redirect('/add-contact');
    }

    public function delete($contact) {
        $singleContact = ContactsModel::where(['id' => $contact])->first();

        if($singleContact === null) {
            die("Contact doesn't exist");
        }

        $singleContact->delete();
        return redirect()->back();


    }
}
