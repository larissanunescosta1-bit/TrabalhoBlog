<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Postagem extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'postagem';
     protected $fillable = ['categoria_id','autor','titulo','texto'];

     public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

}
