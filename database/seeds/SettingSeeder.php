<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'key'=>'site_title',
                'value'=>'any course',
            ], [
                'key'=>'copyright',
                'value'=>'Copyright © 2014-2016',
            ], [
                'key'=>'icon',
                'value'=>'image/icon.png',
            ], [
                'key'=>'logo',
                'value'=>'image/logo.png',
            ], [
                'key'=>'version',
                'value'=>'1.0',
            ],
        ];
        Schema::disableForeignKeyConstraints();
        \App\Setting::truncate();
        \App\Setting::insert($data);
        Schema::enableForeignKeyConstraints();
    }
}
