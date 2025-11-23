<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangedPassword extends Model
{
    protected $table = 'changed_passwords';

    protected $fillable = [
        'password',
    ];
}
