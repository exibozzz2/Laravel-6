<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllOrdersModel extends Model
{
    protected $table = "all_orders";
    protected $fillable = ['user_id', 'status', 'price'];
}
