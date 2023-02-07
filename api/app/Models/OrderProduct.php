<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_product';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public static function getValidationRules(): array
    {
        return [
            'product_sku_id' => ['required', 'exists:product_sku,id'],
            'amount' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'regex:/^\d*(\.\d{2})?$/'],
            'discount' => ['nullable', 'regex:/^\d*(\.\d{2})?$/'],
        ];
    }
}
