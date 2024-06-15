<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Using ORM Eloquent
        $user = new User;
        $user->document = 123456789;
        $user->fullname = 'Juan Perez';
        $user->gender = 'Male';
        $user->birthdate = '1990-01-01';
        $user->phone = '300123';
        $user->email = 'marialopez@example.com';
        $user->password = bcrypt('admin');
        $user->role = 'Administrator';
        $user->save();

        $user = new User;
        $user->document = 1060650654;
        $user->fullname = 'Weimar Tamayo García';
        $user->gender = 'Male';
        $user->birthdate = '1991-06-24';
        $user->phone = '3147587078';
        $user->email = 'weimart24@gmail.com';
        $user->password = bcrypt('123456789');
        $user->role = 'Administrator';
        $user->save();

        // Using DB Array
        DB::table('users')->insert([
            'document' => 1053872476,
            'fullname' => 'Jeimy Tatiana Pinto',
            'gender'=> 'Female',
            'birthdate' => '1999-09-13',
            'phone' => '3058122481',
            'email' => 'jeimytatianapinto@gmail.com',
            'password' => bcrypt('miAmor'),
            'role' => 'Customer',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
