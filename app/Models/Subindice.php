<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subindice extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subindices';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'indice_id',

    ];


    public function indice()
    {
        return $this->belongsTo(Indice::class);
    }
}
