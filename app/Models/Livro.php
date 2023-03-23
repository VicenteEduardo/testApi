<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'livros';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];


    /**ocultador alguns dados */
    protected $hidden = [
        'created_at', 'updated_at', 'usuario_publicador_id', 'deleted_at',

    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_publicador_id');
    }
    public function indices()
    {
        return $this->hasMany(Indice::class);
    }
}
