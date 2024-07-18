<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use App\Models\ProductModel;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $productModel = new ProductModel();

        for ($i = 0; $i < 100; $i++) {
            $productModel->insert($this->generateProduct());
        }
    }

    public function generateProduct(): array
    {
        $faker = Factory::create();

        return [
            "id" => $faker->uuid(),
            "name" => $faker->firstName(),
            "description" => $faker->text(),
            "created_at" => $faker->datetime(),
            "updated_at" => $faker->datetime(),
            "deleted_at" => $faker->boolean() ? $faker->dateTime() : null,
        ];
    }
}
