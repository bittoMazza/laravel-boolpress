<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $firstUser = new User();
         $firstUser->name = 'Ciccio';
         $firstUser->email = 'ciccio@gmail.com';
         $firstUser->password = Hash::make('ciccio@gmail.com');
         $firstUser->save();

         $secondUser = new User();
         $secondUser->name = 'Uno';
         $secondUser->email = 'uno@gmail.com';
         $secondUser->password = Hash::make('prova121343');
         $secondUser->save();
         
    }
}
