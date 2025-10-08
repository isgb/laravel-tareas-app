<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
        public function user()
        {
                return $this->belongsTo(User::class);
        }

        protected $fillable = ['nombre', 'descripcion', 'completada', 'user_id'];

}
