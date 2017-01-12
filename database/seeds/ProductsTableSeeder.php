<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 10)->create();

        $product = \App\Product::all();
        foreach ($product as $p) {
            $p->addMediaFromUrl("https://image-cc.s3.envato.com/files/151390193/Preview%20Image.png")->toMediaLibrary();
        }


    }
}
