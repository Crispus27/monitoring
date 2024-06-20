<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = ['module_id', 'value', 'status'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
