<?php

use Illuminate\Database\Seeder;
use App\{Product, Category};

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = factory(Product::class, 15)->create();
        $categories = factory(Category::class, 10)->create();

        foreach ($products as $product) {
            DB::table('category_product')->insert([
                'category_id' => $categories->first()->id,
                'product_id' => $product->id
            ]);
        }

        factory(Product::class, 10)->create();

        echo "Тестовые данные добавлены \n";
    }
}
