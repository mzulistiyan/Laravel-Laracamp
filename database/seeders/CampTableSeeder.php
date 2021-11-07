<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camps;
class CampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camps = [
            [
                'title' => 'Gila Belajar',
                'slug' => 'gila-belajar',
                'price' => 200,
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
            ],
            [
                'title' => 'Baru Mulai',
                'slug' => 'baru-mulai',
                'price' => 140,
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
            ],
        ];
        // 1St method
        // foreach ($camps as $key => $camp) {
        //     Camps::create($camp);
        // }

        Camps::insert($camps);
    }
}
