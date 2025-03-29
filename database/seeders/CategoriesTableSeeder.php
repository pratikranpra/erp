<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'cat 21',
                'parent_id' => 0,
                'status' => 'inactive',
                'created_at' => '2025-03-27 09:24:29',
                'updated_at' => '2025-03-28 11:57:26',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'child 1',
                'parent_id' => 0,
                'status' => 'active',
                'created_at' => '2025-03-28 08:02:46',
                'updated_at' => '2025-03-29 05:16:14',
            ),
            2 => 
            array (
                'id' => 9,
                'name' => 'asd',
                'parent_id' => 3,
                'status' => 'active',
                'created_at' => '2025-03-28 08:08:30',
                'updated_at' => '2025-03-28 08:08:30',
            ),
            3 => 
            array (
                'id' => 10,
                'name' => 'Rajesh bhai cat - parent',
                'parent_id' => 0,
                'status' => 'active',
                'created_at' => '2025-03-29 05:19:29',
                'updated_at' => '2025-03-29 05:19:29',
            ),
            4 => 
            array (
                'id' => 11,
                'name' => 'rajesh bhai cat - child',
                'parent_id' => 10,
                'status' => 'active',
                'created_at' => '2025-03-29 05:19:49',
                'updated_at' => '2025-03-29 05:19:49',
            ),
        ));
        
        
    }
}