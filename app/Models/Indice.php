<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indice extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'indices';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    /**ocultar alguns campos */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'indice_pai_id', 'livro_id',
    ];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function subindices()
    {
        return $this->hasMany(Subindice::class);
    }

    public function pai()
    {
        return $this->belongsTo(Indice::class, 'indice_pai_id');
    }

    public function filhos()
    {
        return $this->hasMany(Indice::class, 'indice_pai_id');
    }
}
