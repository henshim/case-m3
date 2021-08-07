<?php

namespace App\Http\Repositories;

use App\Models\Foods;
use Illuminate\Support\Facades\DB;

class FoodRepository
{
    protected $foodModel;

    public function __construct(Foods $foodModel)
    {
        $this->foodModel = $foodModel;
    }

    public function getAll()
    {
//        return Foods::with('tag','category','user')->get();
        return Foods::query()
            ->select('foods.id', 'foods.name',
                'foods.image', 'foods.description',
                'foods.price', 'foods.price_after_sale',
                'foods.service_charge', 'foods.preparation_time',
                'tags.name AS tag_name', 'categories.name AS category_name',
                'users.restaurant AS restaurant')
            ->join('tags', 'tags.id', '=', 'tag_id')
            ->join('categories', 'categories.id', '=', 'category_id')
            ->join('users', 'users.id', '=', 'user_id')->paginate(8);
    }

    public function add($request)
    {
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $service_charge = $request->service_charge;
        $preparation_time = $request->preparation_time;
        $tag = $request->tag;
        $cate = $request->category;
        $path = $request->file('img')->store('images', 'public');
        $insert = ['name' => $name, 'description' => $description, 'price' => $price, 'service_charge' => $service_charge,
                    'preparation_time' => $preparation_time,'tag_id'=>$tag,'category_id'=>$cate,
                    'image'=>$path];
        Foods::query()->insert($insert);

        return redirect()->route('admin.food.list');
    }

    public function update($request)
    {
        if ($request->hasFile('img')) {

        }
    }
}
