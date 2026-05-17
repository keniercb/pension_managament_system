<?php

namespace App\Modules\Entity\Database\Seeders;

use App\Modules\Entity\Models\OfficeType;
use Illuminate\Database\Seeder;

class OfficeTypeDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        OfficeType::query()->create([
            'name' => 'Direccion Nacional',
        ]);
        OfficeType::query()->create([
            'name' => 'Direccion Provincial',
        ]);
        OfficeType::query()->create([
            'name' => 'Oficina Municipal',
        ]);
    }
}
