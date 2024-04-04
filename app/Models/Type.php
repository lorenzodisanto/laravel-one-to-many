<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    // relazione tra tabella Type e Project
    public function projects(){
        return $this->hasMany(Project::class);
    }
}
