<?php

namespace App\Repositories;
use App\Models\ContactsModel;


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

    public function createContact($request)
    {
        $this->contactModel->create([
            'name' => $request->get('name'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);
    }

}
?>
