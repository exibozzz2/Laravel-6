<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDataModel extends Model
{
   protected $table = "order_data";

   protected $fillable = ['order_id', 'product_id', 'amount', 'price' ];
}
