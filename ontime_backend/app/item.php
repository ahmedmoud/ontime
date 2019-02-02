<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{

    protected $table = "items";
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','price'
    ];
}
