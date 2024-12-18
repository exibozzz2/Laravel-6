<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradesModel extends Model
{
    protected $table = "grades";
    protected $fillable = [
        "subject", "grade", "professor", "user_id"
        ];
}
