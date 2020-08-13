<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(!\App\User::where(['email' => 'alexis.410@hotmail.com'])->exists()) {
            $user = new App\User();
            $user->password = Hash::make('druchii');
            $user->email = 'alexis.410@hotmail.com';
            $user->name = 'Admin';
            $user->save();
        }
    }
}
