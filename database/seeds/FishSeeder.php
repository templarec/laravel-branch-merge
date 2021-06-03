<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Fish;
use Illuminate\Support\Str;

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
        $fish->slug = $this->generateSlug($fish->name);

        $fish->save();



      }
    }
    private function generateSlug(string $title, bool $change = true)
{
  $slug = Str::slug($title, '-');

  if (!$change) {
    return $slug;
  }

  $slug_base = $slug;
  $contatore = 1;

  $post_with_slug = Fish::where('slug', '=', $slug)->first();
  while ($post_with_slug) {
    $slug = $slug_base . '-' . $contatore;
    $contatore++;

    $post_with_slug = Fish::where('slug', '=', $slug)->first();
  }
  return $slug;

}

}
