<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;

    protected $table = 'agence';
    protected $fillable = [
        'label',
        'users_id',
        'vehicule_id'
    ];
    public $timestamps = false;
}
