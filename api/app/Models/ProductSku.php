<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_sku';

    const SIZE_NAMES = [
        'S',
        'M',
        'L',
        'XL',
        'XXL',
    ];

    /**
     * Get all the products for the category.
     */
    public function attributeValues(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'product_sku_attribute_value');
    }
}
