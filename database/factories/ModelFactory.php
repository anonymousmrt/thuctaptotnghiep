<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('khang12312'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'feature' => $faker->text,
        'description' => $faker->text,
        'status'=>rand(0, 1),
        'category_id' => rand(1, 5),
    ];
});
$factory->define(App\Addon::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'price' => $faker->randomNumber(2),
        'feature' => $faker->text.'/n'.$faker->text.$faker->text,
        'description' => $faker->text,
        'product_id' => rand(1, 10),
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {

    return [
        'user_id' => rand(1, 5),
        'addon_id' => rand(1, 100),
        'status'=>0,

    ];
});

$factory->define(App\Forum::class, function (Faker\Generator $faker) {
    $title = \Illuminate\Support\Facades\DB::table('categories')->select('name')->get()->toArray();
    return [
        'title' => $title[rand(0,4)]->name,
        'parent_id' => 0,
        'product_id' => rand(1, 5),

    ];
});
$factory->define(App\Topic::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->text,
        'forum_id' => rand(1, 5),
        'user_id' => rand(1, 5),

    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->text,
        'parent_id' => rand(1, 200),
        'topic_id' => rand(1, 70),
        'user_id' => rand(1, 5),


    ];
});

