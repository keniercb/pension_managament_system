<?php

namespace App\Modules\Entity\Database\Seeders;

use Illuminate\Database\Seeder;

class EntityDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            OfficeTypeDatabaseSeeder::class,
        ]);
    }
}
