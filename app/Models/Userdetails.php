<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userdetails extends Model
{
    use HasFactory;

protected $table = 'userdetails';

    protected $fillable = [
        'zip_code',
        'city',
        'email',
    ];
}
