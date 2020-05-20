<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\User;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'user_id'  => factory(User::class),
        'name'     => $faker->name,
        'email'    => $faker->email,
        'birthday' => '05/15/2020',
        'company'  => $faker->company,
    ];
});
