<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'description'];
    public function histories()
    {
        return $this->hasMany(History::class);
    }
     // Définir l'attribut status
     public function getStatusAttribute()
     {
         // Récupérer le dernier historique pour ce module
         $lastHistory = $this->histories()->latest()->first();

         if ($lastHistory) {
             return $lastHistory->status;
         }

         return null;
     }
}
