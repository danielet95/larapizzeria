<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'title' => 'Merchant'],
            ['id' => 2, 'title' => 'Client']
        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
