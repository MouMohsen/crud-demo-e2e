<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateOrderStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:stats {src}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $src = $this->argument('src');
        $fileName = str_replace(".csv", "", $src);
        
        $orders = [];
        if (($open = fopen(base_path(). "/$src", "r")) !== FALSE) {

            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $order['id'] = $data[0];
                $order['destination'] = $data[1];
                $order['category'] = $data[2];
                $order['quantity'] = $data[3];
                $order['brand'] = $data[4];
                array_push($orders, $order);
            }

            fclose($open);
        }

        $orders = collect($orders);
        $ordersCount = count($orders);
        $categories = $orders->groupBy('category');

        $averageFileContent = '';
        $popularFileContent = '';
        foreach($categories as $category => $items)
        {
            //Calculate Average
            $avg = array_sum($items->pluck('quantity')->toArray()) / $ordersCount;
            $averageFileContent .= "$category, $avg\n";

            //Find out popular item
            $brandsCount = array_count_values($items->pluck('brand')->toArray());
            arsort($brandsCount);
            $popular = array_keys($brandsCount)[0];
            $popularFileContent .= "$category, $popular\n";

        }

        file_put_contents("./0_$fileName.csv", $averageFileContent);
        file_put_contents("./1_$fileName.csv", $popularFileContent);

        echo "Files Generated";
    }
}
