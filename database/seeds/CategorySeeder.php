<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $new = [
            [
                'description_ar' => 'وصف االكاتيجوري بالعربي',
                'description_en' => 'category description',
                'title_en' => 'ويب2'
                , 'title_ar' => 'web2',                                                           ],
            [
                'description_ar' => 'وصف االكاتيجوري بالعربي',
                'description_en' => 'category description',
                'title_en' => 'ويب2'
                , 'title_ar' => 'web2',                                                           ],
            [
                'description_ar' => 'وصف االكاتيجوري بالعربي',
                'description_en' => 'category description',
                'title_en' => 'ويب2'
                , 'title_ar' => 'web2',                                                           ],
            [
                'description_ar' => 'وصف االكاتيجوري بالعربي',
                'description_en' => 'category description',
                'title_en' => 'ويب2'
                , 'title_ar' => 'web2',                                                           ], [
                'description_ar' => 'وصف االكاتيجوري بالعربي',
                'description_en' => 'category description',
                'title_en' => 'ويب2'
                , 'title_ar' => 'web2',                                                           ], [
                'description_ar' => 'وصف االكاتيجوري بالعربي',
                'description_en' => 'category description',
                'title_en' => 'ويب2'
                , 'title_ar' => 'web2',],


        ];
        \App\Category::insert($new);
        factory(\App\Category::class, 50)->create();
    }
}

