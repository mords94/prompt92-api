<?php

use App\Models\Email;
use App\Models\User;
use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{

    private const DUMMY_USERS_NUMBER = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::query()->count() === 0) {
            for ($i = 0; $i < self::DUMMY_USERS_NUMBER; $i++) {
                $user = factory(User::class)->create();

                print($user->id);
                for($j = 0; $j < rand(1,3); $j++) {
                    factory(Email::class)->create([
                        'user_id' => $user->id,
                    ]);
                }
            }
        }
    }
}