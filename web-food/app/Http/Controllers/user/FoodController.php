<?php

namespace App\Http\Controllers\user;

use App\Http\Repositories\FoodRepository;
use App\Models\Categories;
use App\Models\Foods;
use App\Models\Tags;

class FoodController
{
    protected $foodRepository;

    public function __construct(FoodRepository $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }

    public function index()
    {
        $categories = Categories::all();
        $tags = Tags::all();
        $foods = Foods::query()
            ->select('foods.id', 'foods.name',
                'foods.image', 'foods.description',
                'foods.price', 'foods.discount',
                'foods.service_charge', 'foods.preparation_time',
                'tags.name AS tag_name', 'categories.name AS category_name',
                'users.restaurant AS restaurant')
            ->join('tags', 'tags.id', '=', 'tag_id')
            ->join('categories', 'categories.id', '=', 'category_id')
            ->join('users', 'users.id', '=', 'user_id')->paginate(20);
        return view('layout.user.main', compact('foods', 'categories', 'tags'));
    }
}
