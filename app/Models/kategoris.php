<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoris extends Model
{
    use HasFactory;
    
    protected $guarded = ['mana'];

    public function items()
    {
        return $this->hasMany('App\Models\items');
    }
}
