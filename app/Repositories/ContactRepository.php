<?php

namespace App\Repositories;

use App\Models\ContactsModel;
use App\Models\ProductsModel;

class ContactRepository
{

    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactsModel();
    }


}
?>
