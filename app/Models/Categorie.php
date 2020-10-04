<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id_categorie';

    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'categorie_id', 'id_categorie');
    }
}
