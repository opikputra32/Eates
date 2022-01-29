<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image'
    ];

    public function category()
    {
        return $this->hasOne(ProductCategories::class);
    }

    /**
     * Get the order_item that owns the Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order_item()
    {
        return $this->belongsTo(OrderItem::class);
    }
}
