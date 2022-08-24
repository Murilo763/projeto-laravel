<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'instrutores_id'];

    public function instrutores()
    {
        return $this->belongsTo(instrutores::Class, 'instrutores_id', 'id');
    }

    public function treinos()
    {
        return $this->hasMany(Treinos::Class);
    }
}
