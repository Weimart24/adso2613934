<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat = new Category;
        $cat->name = 'Xbox Series S';
        $cat->manufacturer = 'Microsoft';
        $cat->releasedate = '2020-11-10';
        $cat->description = 'Lorem ipsum dolor sit amet,';
        $cat->save(); 

        $cat = new Category;
        $cat->name = 'PlayStation 5';
        $cat->manufacturer = 'Sony';
        $cat->releasedate = '2020-11-12';
        $cat->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
        $cat->save(); 

        $cat = new Category;
        $cat->name = 'Nintendo Switch';
        $cat->manufacturer = 'Nintendo';
        $cat->releasedate = '2017-03-03';
        $cat->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';;
        $cat->save(); 

        $cat = new Category;
        $cat->name = 'PC';
        $cat->manufacturer = 'Various';
        $cat->releasedate = '1971-11-15';
        $cat->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
        $cat->save(); 
        
    }
}
