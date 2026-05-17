<?php

namespace Database\Seeders;

use App\Modules\Common\Database\Seeders\CommonDatabaseSeeder;
use App\Modules\Entity\Database\Seeders\EntityDatabaseSeeder;
use App\Modules\Pensions\Database\Seeders\PensionsDatabaseSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //CommonDatabaseSeeder::class,
            //EntityDatabaseSeeder::class,
            PensionsDatabaseSeeder::class,
        ]);
    }
}
