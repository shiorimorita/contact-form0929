<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     * @return array
     */
    public function definition()
    {
        $this->faker=\Faker\Factory::create('ja_JP');

        return [
            'first_name'=>$this->faker->firstName(),
            'last_name'=>$this->faker->lastName(),
            'gender'=>$this->faker->numberBetween(1,3),
            'email'=>$this->faker->unique()->safeEmail(),
            'tel'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->streetAddress(),
            'building'=>$this->faker->optional()->secondaryAddress(),
            'category_id'=>$this->faker->numberBetween(1,5),
            'detail'=>$this->faker->randomElement([
            '商品の商品のお届けについての詳細です。',
            '商品の交換についての詳細です。',
            '商品トラブルの詳細です。',
            'ショップへのお問い合わせ内容です。',
            'その他のお問い合わせ内容です。',
            ]),

        ];
    }
}
