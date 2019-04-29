<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'blog_name'   => 'AISSYASS',
            'blog_email'   => 'aissyass91@gmail.com',
            'blog_phone'   => '+212706054443',
            'blog_address'   => 'MAROC - Oujda lazaret'
        ]);
    }
}
