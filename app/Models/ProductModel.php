<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'price',
        'inventory',
        'description',
        'short_description',
        'facebook',
        'linkedin',
        'category_id',
    ];

    protected $table = 'products';

    public function category(): BelongsTo{
        return $this->belongsTo(CategoryModel::class, 'category_id', 'id');
    }
}
