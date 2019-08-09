<?php

use Illuminate\Database\Seeder;

class FunctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $functions = [
        [
            'name' => 'Welcome Party'
        ],
        [
            'name' => 'Going Down'
        ]
        ];
        foreach($functions as $function)
        {
            App\Functions::create($function);
        }
    }
}
