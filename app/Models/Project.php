<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Type;

class Project extends Model
{
    use HasFactory;

    // aggiungo fillable per ricevere i dati dal form
    protected $fillable = ["title", "link", "description"];

    // relazione tra tabella Project e Type
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
