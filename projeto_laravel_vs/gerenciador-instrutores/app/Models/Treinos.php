<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treinos extends Model
{
    use HasFactory;
    protected $fillable = ['exercicio1', 'exercicio2', 'exercicio3', 'exercicio4', 'alunos_id'];

    public function alunos()
    {
        return $this->belongsTo(Alunos::Class);
    }

}
