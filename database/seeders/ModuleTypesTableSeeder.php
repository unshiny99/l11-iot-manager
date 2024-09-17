<?php

namespace Database\Seeders;

use App\Models\ModuleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModuleType::insert([
            ['name' => 'Capteur de température', 'brand' => 'TiTEC', 'model' => 'RTF3/MUA', 'unit' => '°C'],
            ['name' => 'Capteur de vitesse', 'brand' => 'iGPSPORT', 'model' => 'SPD70', 'unit' => 'm/s'],
            ['name' => 'Capteur de distance', 'brand' => 'LFM', 'model' => 'O5DLCPKG/US', 'unit' => 'm'],
        ]);
    }
}
