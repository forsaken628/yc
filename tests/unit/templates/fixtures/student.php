<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016/8/20
 * Time: 23:42
 */
// users.php file under template path (by default @tests/unit/templates/fixtures)
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'org_name' => $faker->firstName.$faker->firstName,
    'org_app_name' => $faker->sentence(1, false),
    'phone' => $faker->phoneNumber,
    'org_address' => $faker->streetAddress,
    'org_url' => $faker->url
//    'name' => $faker->firstName,
//    'phone' => $faker->phoneNumber,
//    'city' => $faker->city,
//    'password' => Yii::$app->getSecurity()->generatePasswordHash('password_' . $index),
//    'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
//    'intro' => $faker->sentence(7, true),  // generate a sentence with 7 words
];