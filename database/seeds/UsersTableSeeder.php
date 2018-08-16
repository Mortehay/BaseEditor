<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserRoles;

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
            'remember_token'=>  str_random(60),
            'user_token'    =>  'MSTb9dUS0NW80OeEw0pfp774NG8rR7uYR0MjyPaE2uyD9Izlv568uZ20q4lt'
        ]);

        $user_id = User::where('name', 'like', '%'.'John Smith'.'%')->first()->id;
        //print_r($user_id);
        UserRoles::create([
            'u_id'=>$user_id,
            'role'=>'admin'
        ]);

    }
}
