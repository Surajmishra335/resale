<?php

namespace Database\Factories;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class AdvertisementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertisement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function getSubCategoryId($categoryId)
    {
        $subcategoryId = '1';
        $childcategoryId = '1';
        if ($categoryId === 1) {
            $subcategoryId = $this->faker->randomElement(['4', '5', '6']);
            if ($subcategoryId === 4) {
                $childcategoryId = $this->faker->randomElement(['8', '9']);
            }
            elseif ($subcategoryId === 5) {
                $childcategoryId = $this->faker->randomElement(['10', '11']);
            }
            else{
                $childcategoryId = $this->faker->randomElement(['12', '13']);
            }
        }
        elseif ($categoryId === 2) {
            $subcategoryId = $this->faker->randomElement(['1', '2', '3']);
            if ($subcategoryId === 1) {
                $childcategoryId = $this->faker->randomElement(['1', '2']);
            }
            elseif ($subcategoryId === 2) {
                $childcategoryId = $this->faker->randomElement(['3', '4', '5']);
            }
            else{
                $childcategoryId = $this->faker->randomElement(['6', '7']);
            }
        }
        elseif ($categoryId === 3) {
            $subcategoryId = $this->faker->randomElement(['7', '8', '9']);
            if ($subcategoryId === 7) {
                $childcategoryId = $this->faker->randomElement(['14', '15']);
            }
            elseif ($subcategoryId === 8) {
                $childcategoryId = $this->faker->randomElement(['16', '17']);
            }
            else{
                $childcategoryId = $this->faker->randomElement(['18', '19']);
            }
        }
        elseif ($categoryId === 4) {
            $subcategoryId = $this->faker->randomElement(['10', '11', '12']);
            if ($subcategoryId === 10) {
                $childcategoryId = $this->faker->randomElement(['20', '21']);
            }
            elseif ($subcategoryId === 11) {
                $childcategoryId = $this->faker->randomElement(['22', '23']);
            }
            else{
                $childcategoryId = $this->faker->randomElement(['24', '25']);
            }
        }
        elseif ($categoryId === 5) {
            $subcategoryId = $this->faker->randomElement(['13', '14', '15', '16']);
            if ($subcategoryId === 13) {
                $childcategoryId = $this->faker->randomElement(['26', '27']);
            }
            elseif ($subcategoryId === 14) {
                $childcategoryId = $this->faker->randomElement(['28']);
            }
            elseif ($subcategoryId === 15) {
                $childcategoryId = $this->faker->randomElement(['29', '30']);
            }
            else{
                $childcategoryId = $this->faker->randomElement(['31', '32']);
            }
        }
        elseif ($categoryId === 6) {
            $subcategoryId = $this->faker->randomElement(['17', '18', '19']);
            if ($subcategoryId === 17) {
                $childcategoryId = $this->faker->randomElement(['33', '34']);
            }
            elseif ($subcategoryId === 18) {
                $childcategoryId = $this->faker->randomElement(['35', '36', '37']);
            }
            else{
                $childcategoryId = $this->faker->randomElement(['38', '39']);
            }
        }
        elseif ($categoryId === 7) {
            $subcategoryId = $this->faker->randomElement(['20', '21', '22']);
            if ($subcategoryId === 20) {
                $childcategoryId = $this->faker->randomElement(['40', '41']);
            }
            elseif ($subcategoryId === 21) {
                $childcategoryId = $this->faker->randomElement(['42', '43']);
            }
            else{
                $childcategoryId = $this->faker->randomElement(['44', '45']);
            }
        }
        elseif ($categoryId === 8) {
            $subcategoryId = $this->faker->randomElement(['23', '24']);
            if ($subcategoryId === 23) {
                $childcategoryId = $this->faker->randomElement(['46', '47']);
            }
            else{
                $childcategoryId = $this->faker->randomElement(['48', '49']);
            }
        }
        elseif ($categoryId === 9) {
            $subcategoryId = $this->faker->randomElement(['25', '26', '27', '28']);

            if ($subcategoryId === 25) {
                $childcategoryId = $this->faker->randomElement(['50', '51']);
            }
            elseif ($subcategoryId === 26) {
                $childcategoryId = $this->faker->randomElement(['52', '53']);
            }
            elseif ($subcategoryId === 27) {
                $childcategoryId = $this->faker->randomElement(['54', '55']);
            }
            else{
                $childcategoryId = $this->faker->randomElement(['56', '57']);
            }
        } 
        
        return array('subcategoryId' => $subcategoryId, 'childCategoryId' => $childcategoryId);
    }


    public function definition()
    {
        $name = $this->faker->unique()->words($nb=4, $asText = true);

        $slug = Str::slug($name);

        $categoryId = $this->faker->numberBetween(1, 9);

        $ids = $this->getSubCategoryId($categoryId);

        $subcategoryId = $ids['subcategoryId'];

        $childcategoryId = $ids['childCategoryId'];
        
        return [
            'user_id' => $this->faker->numberBetween(1,5),
            'feature_image' => 'public/ads/'.$this->faker->numberBetween(1, 126).'.jpg',
            'first_image' => 'public/ads/'.$this->faker->numberBetween(1, 126).'.jpg',
            'second_image' => 'public/ads/'.$this->faker->numberBetween(1, 126).'.jpg',
            'category_id' => $categoryId,
            'subcategory_id' => $subcategoryId,
            'childcategory_id' => $childcategoryId,
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->text(400),
            'price'=> $this->faker->numberBetween(10, 2000),
            'price_status' => $this->faker->randomElement(['fixed', 'negoitable']),
            'product_condition' => $this->faker->randomElement(['likenew', 'heavilyused', 'new']),
            'listing_location' => $this->faker->randomElement(['mumbai', 'pune', 'bengalore', 'delhi', 'kolkata', 'bihar']),
            'country_id'=> '101',
            'state_id' =>   '17',
            'city_id' => '1558',
            'phone_number' => '9999444555',
            'published' => '1',
            'link' => 'https://www.youtube.com/watch?v=73V0Y1HL6G8&ab_channel=TrendMax',

        ];
    }
}
