<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Member;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfMembers = 10;
        $faker = Faker::create();
        for($i = 0; $i<$numberOfMembers; $i++){
            $user = Member::create([ 
                'name' => $faker->name(),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber()
            ]);
        }
    }
}
