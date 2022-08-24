<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrutores extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'idade', 'turno'];

    public function alunos()
    {
        return $this->hasMany(Alunos::Class, 'instrutores_id', 'id');
    }
}
