<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'          =>  'John Smith',
            'email'         =>  'y.shpylovyi@ielpe.com',
            'password'      =>  Hash::make('123456'),
            'remember_token'=>  str_random(10)
        ]);
    }
}
