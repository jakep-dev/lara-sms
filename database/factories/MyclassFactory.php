<?php

use App\School;
use App\Myclass;
use Faker\Generator as Faker;

$factory->define(Myclass::class, function (Faker $faker) {
    static $class_number = 0;

    return [
        'class_number' => $class_number++, //$faker->randomDigitNotNull,
        'school_id'    => function() use ($faker) {
            if (School::count() > 0)
                return $faker->randomElement(School::pluck('id')->toArray());
            else return factory(School::class)->create()->id;
        },
        'group'        => function() use ($class_number) {
            if ($class_number > 8)
                return $faker->randomElement(['science', 'commerce', 'arts']);
            else return "";
        }
    ];
});
