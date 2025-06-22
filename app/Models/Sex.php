<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Sex extends Model
{
    protected $table = 'sexes';
    protected $fillable = ['sex'];

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

}
