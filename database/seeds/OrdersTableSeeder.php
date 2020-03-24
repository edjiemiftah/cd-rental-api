<?php

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\Stock;
use Carbon\Carbon;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // new order data
        DB::table('orders')->insert([
            'member_id' => 1,
            'stock_id'  => 7,
            'rent_date' => '2020-03-15',
            'order_status'  => 'NEW',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
        DB::table('orders')->insert([
            'member_id' => 3,
            'stock_id'  => 9,
            'rent_date' => '2020-03-07',
            'order_status'  => 'NEW',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
        DB::table('orders')->insert([
            'member_id' => 4,
            'stock_id'  => 10,
            'rent_date' => '2020-03-13',
            'order_status'  => 'NEW',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
        DB::table('orders')->insert([
            'member_id' => 5,
            'stock_id'  => 11,
            'rent_date' => '2020-02-11',
            'order_status'  => 'OUTDATE',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        // complete orders data
        DB::table('orders')->insert([
            'member_id' => 2,
            'stock_id'  => 8,
            'rent_date' => '2020-02-11',
            'return_date'   => '2020-02-18',
            'order_status'  => 'COMPLETE',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
        $orderId = DB::getPdo()->lastInsertId();
        DB::table('orders_payments')->insert([
            'order_id' => $orderId,
            'days_rent'  => 7,
            'rate' => 15000,
            'total'   => 105000,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
