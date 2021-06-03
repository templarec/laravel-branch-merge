<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Fish;

class FishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(faker $faker)
    {
      for ($i=0; $i < 10 ; $i++) {
        $fish = new Fish();
        $fish->name = $faker->name();
        $fish->price = $faker->randomFloat(2,100,500);
        $fish->weight = $faker->randomFloat(2,0,100);
        $fish->race = $faker->name();

        $fish->save();

      }
    }
}
