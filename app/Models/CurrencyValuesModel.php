<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyValuesModel extends Model
{
    protected $table = 'currency_values';

    protected $fillable = ['value', 'cash_buy', 'exchange_middle', 'cash_sell',];
}
