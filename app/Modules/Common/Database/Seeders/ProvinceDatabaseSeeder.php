<?php

namespace App\Modules\Common\Database\Seeders;

use App\Modules\Common\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            [
                'name' => 'Pinar del Río',
                'code' => '21',
                'abbreviation' => 'PR',
                'municipalities' => [
                    [
                        'name' => 'Mantua',
                        'code' => '21.01',
                    ], [
                        'name' => 'Sandino',
                        'code' => '21.02',
                    ]
                ]
            ], [
                'name' => 'Artemisa',
                'code' => '22',
                'abbreviation' => 'ART',
                'municipalities' => [
                    [
                        'name' => 'Guira de Melena',
                        'code' => '22.01',
                    ], [
                        'name' => 'San Antonio de los Baños',
                        'code' => '22.02',
                    ]
                ]
            ]
        ];
        foreach ($provinces as $provinceData) {
            $municipalities = $provinceData['municipalities'];
            unset($provinceData['municipalities']);
            $province = Province::create($provinceData);
            foreach ($municipalities as $municipality) {
                $province->municipalities()->create($municipality);
            }
        }
    }
}
