<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'a', 'b', 'c',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'source';

    public $timestamps = false;
}
