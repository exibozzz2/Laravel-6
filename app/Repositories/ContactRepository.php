<?php

namespace App\Repositories;
use App\Http\Requests\AddContactRequest;
use App\Http\Requests\UpdateContactRequest;use App\Models\ContactsModel;


class ContactRepository
{

    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactsModel();
    }

    public function test()
    {
        dd("123");
    }

    public function createContact(AddContactRequest $request)
    {
        $this->contactModel->create([
            'name' => $request->get('name'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);
    }

    public function updateContact(UpdateContactRequest $contact, $request)
    {
        $contact->name = $request->get('name');
        $contact->subject = $request->get('subject');
        $contact->message = $request->get('message');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->save();
    }

}
?>
