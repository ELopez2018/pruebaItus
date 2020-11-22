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
        // $this->call(UserSeeder::class);
        factory(App\Status::class, 2)->create();
        factory(App\ServiciosIntereses::class,9)->create();
        factory(App\TiposServicios::class, 9)->create();
        factory(App\Usuario::class, 3)->create();
    }
}
