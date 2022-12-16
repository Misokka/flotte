<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commande';
    public $timestamps = false;
    protected $fillable = [
        'users_id',
        'vehicule_id'
    ];

    public function vehicule() {
        return $this->hasOne(Vehicule::class);
    }
}
