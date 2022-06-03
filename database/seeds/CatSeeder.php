<?php

use Illuminate\Database\Seeder;
use App\Category;
class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Category();
        $cat->category = 'Local News';
        $cat->user_id = '1'; 
        $cat->save();
        $cat = new Category();
        $cat->category = 'International News';
        $cat->user_id = '1'; 
        $cat->save();
        $cat = new Category();
        $cat->category = 'Regional News';
        $cat->user_id = '1';  
        $cat = new Category();
        $cat->category = 'Domestic News';
        $cat->user_id = '1';
        $cat->save();
    }
}