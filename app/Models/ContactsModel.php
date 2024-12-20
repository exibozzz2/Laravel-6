<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactsModel extends Model
{
    protected $table = "contacts";

    protected $fillable = [
     'name', 'subject', 'message', 'email', 'phone'
    ];
}
