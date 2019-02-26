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
        factory(App\Models\User::class)->create([
            'first_name' => 'name',
            'last_name' => 'surname',
            'email' => 'name@mail.loc',
            'password' => Hash::make('123456'),
        ]);

        factory(App\Models\User::class, 10)->create();
    }
}
