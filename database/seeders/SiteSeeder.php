<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    public function run(): void
    {
        $sites = [
            'NCX Medan','NCX Batam','NCX Pekanbaru','NCX Palembang','NCX Aceh','NCX Lampung','NCX Meruya','NCX Karet',
            'NCX Jatinegara','NCX Lembong','NCX Candi','NCX Kotabaru','NCX Gubeng','NCX Kebalen','NCX Kaliasem','NCX Batuampar',
            'NCX Ulin','NCX Mattoangin','NCX Paniki','NCX Pontianak','NCX Malang','NCX Pugeran','NCX Cirebon','NCX Sepaku'
        ];

        foreach ($sites as $site) {
            DB::table('sites')->insert([
                'name' => $site,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
