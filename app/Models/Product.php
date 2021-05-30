<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model 
{
    use HasFactory;
    protected $fillable = [
        'category_id', 
        'productID',
        'name',
        'product_code_id',
        'quantity',
        'price',
        'brand',
        'model'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCode()
    {
        return $this->belongsTo(ProductCode::class);
    }

}
