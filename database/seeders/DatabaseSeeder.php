<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
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
    // \App\Models\User::factory(10)->create();

    User::factory(3)->create();

    Category::create([
      'name' => 'Horror'
    ]);

    Category::create([
      'name' => 'Action'
    ]);

    Category::create([
      'name' => 'Comedy'
    ]);

    Book::factory(10)->create();
  }
}
