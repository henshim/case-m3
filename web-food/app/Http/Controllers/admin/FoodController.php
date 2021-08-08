<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\FoodRepository;
use App\Models\Categories;
use App\Models\Foods;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FoodController extends Controller
{
    protected $foodRepository;

    public function __construct(FoodRepository $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }

    public function userCan($action, $option = null)
    {
        $user = Auth::user();
        return Gate::forUser($user)->allows($action, $option);
    }

    public function index()
    {
        $foods = $this->foodRepository->getAll();
        return view('backend.admin.food.list', compact('foods'));
    }

    public function create()
    {
        $tags = Tags::all();
        $categories = Categories::all();
        return view('backend.admin.food.create', compact('categories', 'tags'));

    }

    public function store(Request $request)
    {

        if ($request->hasFile('img')) {
            $name = $request->name;
            $description = $request->description;
            $price = $request->price;
            $service_charge = $request->service_charge;
            $preparation_time = $request->preparation_time;
            $discount = $request->discount;
            $tag = $request->tag;
            $cate = $request->category;
            $path = $request->file('img')->store('images', 'public');
            $insert = ['name' => $name, 'description' => $description, 'price' => $price, 'service_charge' => $service_charge,
                'preparation_time' => $preparation_time, 'tag_id' => $tag, 'category_id' => $cate,
                'image' => $path, 'discount' => $discount];
            Foods::query()->insert($insert);
            return redirect()->route('admin.food.list');
        } else {
            $name = $request->name;
            $description = $request->description;
            $price = $request->price;
            $service_charge = $request->service_charge;
            $preparation_time = $request->preparation_time;
            $tag = $request->tag;
            $cate = $request->category;
            $discount = $request->discount;
            //$path = $request->file('img')->store('images', 'public');
            $insert = ['name' => $name, 'description' => $description, 'price' => $price, 'service_charge' => $service_charge,
                'preparation_time' => $preparation_time, 'tag_id' => $tag, 'category_id' => $cate,
                'image' => 'default-product-image.png', 'discount' => $discount];
            Foods::query()->insert($insert);
            return redirect()->route('admin.food.list');
        }
    }

    public function update()
    {

    }

    public function edit()
    {

    }

    public function show()
    {

    }

    public function destroy()
    {

    }

}
