<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImportCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import CSV command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $row = 0;
        if (($handle = fopen(storage_path('app/products.csv'), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if ($row > 0) {
                    $productExists = Product::query()->where('code', '=', $data[0])->first();
                    if ($productExists) {
                        Log::info('Product with code = ' . $data[0] . ' already exists, import not executed');
                    } else {
                        $data = array_map(static function($item) {
                            return trim($item, ' \'"');
                        }, $data);
                        Product::create([
                            'code' => array_key_exists(0, $data) ? $data[0] : '',
                            'name' => array_key_exists(1, $data) ? $data[1] : '',
                            'level1' => array_key_exists(2, $data) ? $data[2] : '',
                            'level2' => array_key_exists(3, $data) ? $data[3] : '',
                            'level3' => array_key_exists(4, $data) ? $data[4] : '',
                            'price' => array_key_exists(5, $data) ? (float) $data[5] : '',
                            'price_sp' => array_key_exists(6, $data) ? (float) $data[6] : '',
                            'amount' => array_key_exists(7, $data) ? (int) $data[7] : '',
                            'properties' => array_key_exists(8, $data) ? $data[8] : '',
                            'joint_purchase' => array_key_exists(9, $data) ? $data[9] : '',
                            'unit' => array_key_exists(10, $data) ? $data[10] : '',
                            'picture' => array_key_exists(11, $data) ? $data[11] : '',
                            'short_description' => array_key_exists(12, $data) ? $data[12] : '',
                            'description' => array_key_exists(13, $data) ? $data[13] : '',
                        ]);
                    }
                }
                $row++;
            }
            fclose($handle);
        }
        return 0;
    }
}
