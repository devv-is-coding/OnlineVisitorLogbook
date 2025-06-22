<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Sex;

class Visitor extends Model
{
    use SoftDeletes;

    protected $table = 'visitors';

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'age',
        'sex_id',
        'purpose_of_visit',
        'contact_number',
    ];

    public function sex()
    {
        return $this->belongsTo(Sex::class);
    }
}
