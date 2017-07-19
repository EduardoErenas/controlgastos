<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	\DB::table('users')->insert(array(
     		'name' =>'carlos',
     		'email' =>'carlos_pano14@hotmail.com',
     		'password' => \Hash::make('secret')
     		));   
    }
}
