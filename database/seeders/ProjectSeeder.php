<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// importo faker
use Faker\Generator as Faker;
// importo facades string
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) { 
            $project = new Project;

            $project->title = $faker->catchPhrase();
            $project->slug = Str::slug($project->title);
            $project->description = $faker->paragraph(2, true);
            $project->link = $faker->url();
            $project->save();
        }
    }
}
