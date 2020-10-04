<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';

    protected $fillable = ['name', 'description', 'price', 'categorie_id'];

    public function categorie()
    {
        return $this->hasOne('App\Models\Categorie', 'id_categorie', 'categorie_id');
    }
}
