<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        // Daftar nama barang
        $barang = [
            ['nama' => 'Hand Trucks', 'foto' => 'hand trucks.jpg', 'type_id' => 1],
            ['nama' => 'Kursi Kantor', 'foto' => 'kursi kantor.jpg', 'type_id' => 1],
            ['nama' => 'Meja Meeting', 'foto' => 'meja meeting.jpg', 'type_id' => 2],
            ['nama' => 'Meja Kantor', 'foto' => 'meja kantor.jpeg', 'type_id' => 2],
            ['nama' => 'Tangki BBM kecil', 'foto' => 'Tangki bbm 2.jpg', 'type_id' => 5],
            ['nama' => 'Tangki BBM medium', 'foto' => 'Tangki bbm 3.jpg', 'type_id' => 6],
            ['nama' => 'Tangki BBM besar', 'foto' => 'Tangki bbm 4.jpg', 'type_id' => 6],
            ['nama' => 'Forklift', 'foto' => 'forklift.jpg', 'type_id' => 2],
            ['nama' => 'Pallet', 'foto' => 'pallet.jpg', 'type_id' => 2],
            ['nama' => 'Platform Truck', 'foto' => 'platform truck.jpg', 'type_id' => 2]
        ];
        
        for($i = 0; $i < 5; $i++) {
            // Simpan barang untuk pengguna pertama
            DB::table('inventories')->insert([
                'nama' => $barang[$i]['nama'],
                'status' => 'tersedia',
                'kondisi' => 'baru',
                'nama_pic' => $users[$i+1]->name,
                'telp_pic' => $users[$i+1]->phone,
                'stok' => 2,
                'deskripsi' => 'Deskripsi '.$i,
                'lokasi' => 'Gudang ' . ($i + 1),
                'foto' => $barang[$i]['foto'], 
                'pic_id' => $i+2,
                'type_id' => $barang[$i]['type_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Simpan barang untuk pengguna kedua
            DB::table('inventories')->insert([
                'nama' => $barang[$i+5]['nama'],
                'status' => 'tersedia',
                'kondisi' => 'bekas',
                'nama_pic' => $users[$i+1]->name,
                'telp_pic' => $users[$i+1]->phone,
                'stok' => 2,
                'deskripsi' => 'Deskripsi '.$i,
                'lokasi' => 'Gudang ' . ($i + 1),
                'foto' => $barang[$i+5]['foto'], 
                'pic_id' => $i+2,
                'type_id' => $barang[$i+5]['type_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
