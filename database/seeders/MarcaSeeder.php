<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MarcaSeeder extends Seeder
{

    private $marca = [
        ['Volkswagen'],
        ['Suzuki'],
        ['Seat'],
        ['Renault']
            ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ($this->marca as $value) {
            Marca::create([
                'name' => $value[0],
            ]);
        }
    }
}
