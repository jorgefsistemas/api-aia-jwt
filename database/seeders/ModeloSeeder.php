<?php

namespace Database\Seeders;

use App\Models\Modelo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModeloSeeder extends Seeder
{
    private $volkswagen = [
        ['jetta'],
        ['Golf'],
        ['polo']
        ];
        private $suzuki = [
            ['swift'],
            ['ignis'],
            ['ertiga']
            ];
        private $seat = [
            ['ibiza'],
            ['arona'],
            ['leon']
            ];
        private $renault = [
            ['captur'],
            ['kangoo'],
            ['duster']
            ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ($this->volkswagen as $value) {
            Modelo::create([
                'name' => $value[0],
                'marca_id' => 1
            ]);
        }

        foreach ($this->suzuki as $value) {
            Modelo::create([
                'name' => $value[0],
                'marca_id' => 2
            ]);
        }
        foreach ($this->seat as $value) {
            Modelo::create([
                'name' => $value[0],
                'marca_id' => 3
            ]);
        }
        foreach ($this->renault as $value) {
            Modelo::create([
                'name' => $value[0],
                'marca_id' => 4
            ]);
        }

    }
}
