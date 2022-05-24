<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'date',
<<<<<<< HEAD
        'input',
        'response'
=======
        'input'
>>>>>>> d321eac (feat: making logs)
    ];
}
