<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventoryImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory_images')->insert([
            ['inventory_id' => '1', 'filename' => 'hand trucks.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['inventory_id' => '2', 'filename' => 'kursi kantor.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['inventory_id' => '3', 'filename' => 'meja meeting.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['inventory_id' => '4', 'filename' => 'meja kantor.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['inventory_id' => '5', 'filename' => 'Tangki bbm 2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['inventory_id' => '6', 'filename' => 'Tangki bbm 3.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['inventory_id' => '7', 'filename' => 'Tangki bbm 4.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['inventory_id' => '8', 'filename' => 'forklift.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['inventory_id' => '9', 'filename' => 'pallet.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['inventory_id' => '10', 'filename' => 'platform truck.jpg', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
