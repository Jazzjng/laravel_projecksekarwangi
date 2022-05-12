<?php

namespace Modules\Tentang\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DokterFactoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Tentang\Entities\DokterFactory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dokter' => $this->faker->nama_dokter(),
            'alamat_dokter' => $this->faker->alamat()
        ];
    }
}

