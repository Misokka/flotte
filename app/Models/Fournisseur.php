<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $table = 'fournisseur';
    protected $fillable = [
        'label',
    ];
    public $timestamps = false;

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }
}
