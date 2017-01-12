<?php

use Illuminate\Database\Seeder;

class AddonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Addon::class, 50)->create();
        $addon = \App\Addon::all();
        foreach($addon as $p){
            $p->addMediaFromUrl("https://image-cc.s3.envato.com/files/218856347/inline-590.png")->toMediaLibrary();
        }
    }
}
