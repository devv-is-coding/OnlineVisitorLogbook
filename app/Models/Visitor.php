<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitors';
    protected $primaryKey = 'id';
    protected $fillable = ['firstname', 'middlename', 'lastname', 'age', 'sex', 'purpose_of_visit', 'contact_number'];
}
