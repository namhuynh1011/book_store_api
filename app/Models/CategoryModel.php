<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryModel extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'categories';

    public function products(): HasMany {
        return $this->hasMany(ProductModel::class);
    }
}
