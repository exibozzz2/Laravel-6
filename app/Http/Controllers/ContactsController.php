<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\ContactsModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactsController extends Controller
{


    private $connectRepository;

    public function __construct()
    {

        $this->connectRepository = new ContactRepository();

    }


    public function getAllContacts() {

        $allContacts = ContactsModel::all();
        return view('allContacts', compact('allContacts'));
    }


    public function addContact(AddContactRequest $request) {

        $this->connectRepository->createContact($request);
        return redirect()->route('all.contacts');
    }

    public function delete(ContactsModel $contact) {

        $contact->delete();
        return redirect()->back();
    }

    public function viewSingleContact(ContactsModel $contact) {

        return view('editContact', compact('contact'));

    }

    public function update(UpdateContactRequest $request, ContactsModel $contact) {

        $this->connectRepository->updateContact($contact, $request);
        return redirect()->route('all.contacts');

    }
}
