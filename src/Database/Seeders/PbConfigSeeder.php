<?php

namespace Anibalealvarezs\Projectbuilder\Database\Seeders;

use Anibalealvarezs\Projectbuilder\Models\PbConfig as Config;
use Illuminate\Database\Seeder;

class PbConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Config
        Config::create(['key' => '_APP_NAME_', 'value' => 'Builder']);
        Config::create(['key' => '_FORCE_HTTPS_', 'value' => false]);
    }
}
