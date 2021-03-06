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
         $this->call(UserSeeder::class);
        // Creates Articles with an Author and Comment
        // through relations & attribute Closures
        factory(App\Article::class, 5)
            ->create()
            ->each(function ($u) {
                $u->comments()->save(factory(App\Comment::class)->create());
            }
            );

        // Creates authors with no articles
        factory(App\People::class, 2)->create();

        // Creates Articles without Comments
        factory(App\Article::class, 3)->create();
    }
}
