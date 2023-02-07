<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $order = $request->get('order');
        $order['code'] = Order::generateCode();
        $order['status'] = 'New';
        $orderProducts = $request->get('order_products');

        try {
            Validator::validate($order, Order::getValidationRules());

            foreach ($orderProducts as $orderProduct) {
                Validator::validate($orderProduct, OrderProduct::getValidationRules());
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => 'false',
                'errors' => [
                    $e->errors(),
                ],
            ], 400);
        }

        DB::transaction(function () use ($order, $orderProducts) {
            $order = Order::create($order);

            array_walk($orderProducts, function ($orderProduct) use ($order) {
                $orderProduct['order_id'] = $order->id;
            });
            $orderProducts = $order->orderProducts()->createMany($orderProducts);
        });

        sleep(2.5);

        return response()->json([
            'success' => true,
            'orderCode' => $order['code'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
