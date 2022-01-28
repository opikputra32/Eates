<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategories extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'category'
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Books::class);
    }
}
