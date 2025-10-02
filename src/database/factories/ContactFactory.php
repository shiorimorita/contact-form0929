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

        $category_id=$this->faker->numberBetween(1,5);

        $details=[
             1 => '商品の商品のお届けについての詳細です。',
        2 => '商品の交換についての詳細です。',
        3 => '商品トラブルの詳細です。',
        4 => 'ショップへのお問い合わせ内容です。',
        5 => 'その他のお問い合わせ内容です。',
        ];

        return [
            'first_name'=>$this->faker->firstName(),
            'last_name'=>$this->faker->lastName(),
            'gender'=>$this->faker->numberBetween(1,3),
            'email'=>$this->faker->unique()->safeEmail(),
            'tel'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->streetAddress(),
            'building'=>$this->faker->optional()->secondaryAddress(),
            'category_id'=>$category_id,
            'detail'=>$details[$category_id],
            ];

    }
}
