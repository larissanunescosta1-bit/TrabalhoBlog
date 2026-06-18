<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
      use HasFactory, SoftDeletes;
      protected $table = 'categoria';
       protected $fillable = ['nome'];

        public function postagens()
    {
        return $this->hasMany(Postagem::class);
    }
}
