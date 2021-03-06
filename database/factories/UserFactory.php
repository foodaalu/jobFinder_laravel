<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\User;
use App\Models\Company;
use App\Models\Job;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


/* user */
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'user_type' =>  'seeker',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});



/* company */
$factory->define(Company::class, function (Faker $faker) {
    return [
         'user_id' => User::all()->random()->id,
         'cname' =>  $name = $faker->company,
         'slug' => Str::slug($name),
         'address' => $faker->address,
         'phone' => $faker->phoneNumber,
         'website' => $faker->domainName,
         'logo' => 'avatar/man.jpg',
         'cover_photo' => 'cover/banner.png',
         'slogan' => 'learn-earn and grow',
         'description' => $faker->paragraph(rand(2,10)),
    ];
});


/* category */
$factory->define(Category::class, function (Faker $faker) {
    return [
         'name' => $faker->title
    ];
});

/* job */

$factory->define(Job::class,function(Faker $faker){
        return [
            'user_id' => User::all()->random()->id,
            'company_id' => Company::all()->random()->id,
            'title' => $title = $faker->text,
            'slug' => Str::slug($title),
            'position' => $faker->jobTitle,
            'address' => $faker->address,
            'description' => $faker->paragraph(rand(2,10)),
            'roles' => $faker->text,
            'category_id' => Category::all()->random()->id,
            'status' => rand(0,1),
            'type' => 'fulltime',
            'last_date' => $faker->dateTime
        ];
});
