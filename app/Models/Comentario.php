<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
       use HasFactory, softDeletes;
       protected $table = 'comentario';
 protected $fillable = ['postagem_id','autor','texto'];

    public function postagem()
    {
        return $this->belongsTo(Postagem::class);
    }
}
