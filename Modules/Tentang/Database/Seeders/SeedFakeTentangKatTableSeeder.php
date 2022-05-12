<?php

namespace Modules\Tentang\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeedFakeTentangKatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TentangKat::create([
            'tentang_nama' => 'Visi & Misi',
            'tentang_status' => true,
        ]);
    }
}
