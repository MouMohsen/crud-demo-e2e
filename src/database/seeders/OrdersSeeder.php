<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordersData = ["Willard Vista,Intelligent Copper Knife,3,Hilll-Gorczany",
        "Roger Centers,Intelligent Copper Knife,1,Kunze-Bernhard",
        "Roger Centers,Small Granite Shoes,4,Rowe and Legros",
        "Roger Centers,Intelligent Copper Knife,4,Hilll-Gorczany",
        "Willa Hollow,Intelligent Copper Knife,4,Hilll-Gorczany"];

        foreach($ordersData as $order)
        {
            $data = explode(",", $order);
            Order::create([
                "deliver_to" => $data[0],
                "product_category"  => $data[1],
                "product_quantity"  => $data[2],
                "product_brand"  => $data[3],
            ]);
        }
    }
}
