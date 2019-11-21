<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    protected $table = 'sequences';

    protected $fillable = [
        'sequence', 'step', 'img'
    ];
}
