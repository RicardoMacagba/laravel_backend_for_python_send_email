<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['recipient', 'subject', 'link', 'status', 'error'];
}
