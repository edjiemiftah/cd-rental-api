<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Stock;
use App\Models\Order;
use Carbon\Carbon;
use DB;

class OrderController extends Controller
{
    // New rent order
    public function new(Request $request) {
        $this->validate($request, [
            'stock_id'  => 'required',
            'member_id' => 'required'
        ]);
        $stock_id = $request->input('stock_id');
        $member_id = $request->input('member_id');
        // Check stock availability
        $stock = Stock::find($stock_id);
        if ($stock->quantity == 0) {
            return response()->json(['status' => 'error', 'message' => 'Out of stock'], 102);
        } else {
            $currentStock = $stock->quantity;
            DB::beginTransaction();
            $order = new Order();
            $order->member_id = $member_id;
            $order->stock_id = $stock_id;
            $order->rent_date = date('Y-m-d');
            $order->order_status = 'NEW';
            $order->created_at = Carbon::now();

            try {
                $order->save();
                $order_id = DB::getPdo()->lastInsertId();
                // update stock
                $stock->quantity = $currentStock - 1;
                $stock->save();
                DB::commit();
                return response()->json(['status' => 'success', 'message' => 'New rent order has been saved.', 'order_id' => $order_id], 200);
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'error', 'message' => 'Failed to save new rent order. ' . $e], 400);
            }
        }
    }

    // Return rent (finish rent) with payment
    public function complete(Request $request) {
        $this->validate($request, [
            'order_id'  => 'required'
        ]);
        $order_id = $request->input('order_id');

        // Check Order status
        $order = Order::find($order_id);
        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order not found.'], 404);
        }
        if ($order->order_status == 'COMPLETE') {
            return response()->json(['status' => 'error', 'message' => 'This order was completed.'], 400);
        }

        $rent_date = new Carbon($order->rent_date);
        $return_date = Carbon::now();
        $days_rent = $rent_date->diff($return_date)->days;
        $stock = Stock::find($order->stock_id);
        if($stock && $days_rent > 0) {
            $total = $days_rent * $stock->rate;
            DB::beginTransaction();
            try {
                // Insert into payment table
                DB::table('orders_payments')->insert([
                    'order_id'      => $order_id,
                    'days_rent'     => $days_rent,
                    'rate'          => $stock->rate,
                    'total'         => $total,
                    'created_at'    => Carbon::now()
                ]);
                $payment_id = DB::getPdo()->lastInsertId();

                // Update order status
                $order->return_date = $return_date;
                $order->order_status = 'COMPLETE';
                $order->updated_at = Carbon::now();
                $order->save();

                // Update stock quantity
                $stock->quantity = $stock->quantity + 1;
                $stock->updated_at = Carbon::now();
                $stock->save();

                DB::commit();
                return response()->json(['status' => 'success', 'message' => 'Payment success, stock availability has been updated.', 'payment_id' => $payment_id], 200);
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['status' => 'error', 'message' => 'Failed to save new rent order. ' . $e], 400);
            }
        }
    }
}
