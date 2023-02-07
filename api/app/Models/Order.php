<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    const STATUSES = [
        'New',
        'Paid',
        'Failed',
        'Cancelled',
        'Shipped',
        'Delivered',
        'Returned',
        'Complete',
    ];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public static function generateCode(): string
    {
        return 'MO-' . time();
    }

    public static function getValidationRules(): array
    {
        return [
            'code' => ['unique:order'],
            'email' => ['required', 'max:50', 'email'],
            'phone' => ['max:15', 'nullable'],
            'firstname' => ['required', 'alpha', 'max:50'],
            'lastname' => ['required', 'alpha', 'max:50'],
            'address_line_1' => ['required'],
            'address_line_2' => ['nullable'],
            'status' => [Rule::in(Order::STATUSES)],
            'delivery_id' => ['integer', 'exists:delivery,id'],
            'payment_id' => ['integer', 'exists:payment,id'],
            'country' => ['required', 'alpha', 'string'],
            'postal_code' => ['required'],
            'city' => ['required', 'alpha', 'string'],
            'total' => ['required', 'regex:/^\d*(\.\d{2})?$/'],
            'delivery_cost' => ['required', 'regex:/^\d*(\.\d{2})?$/'],
        ];
    }
}
