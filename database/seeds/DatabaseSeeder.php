<?php

use Illuminate\Database\Seeder;
use App\{Product, Category, Image};

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->truncate();

        $products = factory(Product::class, 15)->create();
        $categories = factory(Category::class, 10)->create();
        
        for($i = 0; $i < 10; $i++){
            factory(Image::class)->create([
                'product_id' => $products->first()->id,
                'filename' => $i . ".jpg"
            ]);
        }

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
