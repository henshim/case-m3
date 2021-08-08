<?php

namespace App\Http\Repositories;

use App\Models\Foods;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FoodRepository
{
    protected $foodModel;

    public function __construct(Foods $foodModel)
    {
        $this->foodModel = $foodModel;
    }

    public function getAllByUser()
    {
//        return Foods::with('tag','category','user')->get();
        return Foods::query()
            ->select('foods.id', 'foods.name',
                'foods.image', 'foods.description',
                'foods.price', 'foods.discount',
                'foods.service_charge', 'foods.preparation_time',
                'tags.name AS tag_name', 'categories.name AS category_name',
                'users.restaurant AS restaurant')
            ->join('tags', 'tags.id', '=', 'tag_id')
            ->join('categories', 'categories.id', '=', 'category_id')
            ->join('users', 'users.id', '=', 'user_id')->where('user_id',Auth::user()->id)->paginate(2);
    }

    public function getAll()
    {
        return Foods::query()
            ->select('foods.id', 'foods.name',
                'foods.image', 'foods.description',
                'foods.price', 'foods.discount',
                'foods.service_charge', 'foods.preparation_time',
                'tags.name AS tag_name', 'categories.name AS category_name',
                'users.restaurant AS restaurant')
            ->join('tags', 'tags.id', '=', 'tag_id')
            ->join('categories', 'categories.id', '=', 'category_id')
            ->join('users', 'users.id', '=', 'user_id')->paginate(2);
    }
    public function add($request)
    {
    }

    public function update($request)
    {
        if ($request->hasFile('img')) {
            $id = $request->id;
            $name = $request->name;
            $description = $request->description;
            $price = $request->price;
            $service_charge = $request->service_charge;
            $preparation_time = $request->preparation_time;
            $tag = $request->tag;
            $cate = $request->category;
            $path = $request->file('img')->store('images', 'public');
            $update = ['name' => $name, 'description' => $description, 'price' => $price, 'service_charge' => $service_charge,
                'preparation_time' => $preparation_time, 'tag_id' => $tag, 'category_id' => $cate,
                'image' => $path];
            Foods::query()->where($id)->update($update);
            return redirect()->route('admin.food.list');
        } else {
            $id = $request->id;
            $name = $request->name;
            $description = $request->description;
            $price = $request->price;
            $service_charge = $request->service_charge;
            $preparation_time = $request->preparation_time;
            $tag = $request->tag;
            $cate = $request->category;
            //$path = $request->file('img')->store('images', 'public');
            $update = ['name' => $name, 'description' => $description, 'price' => $price, 'service_charge' => $service_charge,
                'preparation_time' => $preparation_time, 'tag_id' => $tag, 'category_id' => $cate,];
            Foods::query()->where($id)->update($update);
            return redirect()->route('admin.food.list');
        }
    }
}
