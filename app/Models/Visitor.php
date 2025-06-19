<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
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
        'purpose_of_visit',
        'contact_number',
    ];
    public function sexes(): MorphToMany
    {
        return $this->morphToMany(
            Sex::class,         
            'model',                 
            'model_has_sexes',     
            'model_id',             
            'sex_id'               
        );
    }

    public function sex()
    {
        return $this->sexes()->first();
    }
}
