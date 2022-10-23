<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MarcaSeeder;
use Database\Seeders\ModeloSeeder;

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

        \App\Models\User::factory()->create([
            'name' => 'admin',
             "password" => bcrypt('todoensubastas'),
            'email' => 'admin@todoensubastas.com.mx'
        ]);


        $this->call(MarcaSeeder::class);
        $this->call(ModeloSeeder::class);
    }
}
