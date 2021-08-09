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
        return view('frontend.list', compact('foods'));
    }

    public function index2()
    {
        $foods = $this->foodRepository->getAllByUser();
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

    public function update($id)
    {
        $food = Foods::query()->findOrFail($id);
        //dd($food);
        $tags = Tags::all();
        $categories = Categories::all();
        return view('backend.admin.food.update', compact('food', 'tags', 'categories'));
    }

    public function edit(Request $request)
    {
        if ($request->hasFile('img')) {
            $id = $request->id;
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
                'image' => $path, 'discount' => $discount, 'user_id' => Auth::user()->id];
            Foods::query()->where('id', $id)->update($insert);
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
            $discount = $request->discount;
            //$path = $request->file('img')->store('images', 'public');
            $insert = ['name' => $name, 'description' => $description, 'price' => $price, 'service_charge' => $service_charge,
                'preparation_time' => $preparation_time, 'tag_id' => $tag, 'category_id' => $cate, 'discount' => $discount,
                'user_id' => Auth::user()->id];
            Foods::query()->where($id)->update($insert);
            return redirect()->route('admin.food.list');
        }
    }

    public function show()
    {

    }

    public function destroy($id)
    {
        $food = Foods::query()->findOrFail($id);
        $food->delete();
        return response()->json(['message' => 'done']);
    }

    public function cart()
    {
        if (Auth::check()) {
            $cart = auth()->get('cart');
            if ($cart == null) {
                return response()->json(['message' => 'return home to add more food']);
            }
            return view('frontend.cart', compact('cart'));
        }
    }

    public function addToCart($id)
    {
        $carts = auth()->get('cart');
        $food = Foods::query()->findOrFail($id);
        if (!$carts) {
            $carts = [
                $id => [
                    'name' => $food->name,
                    'price' => $food->price,
                    'quantity' => 1,
                    'img' => $food->img,
                    'discount' => $food->discount,
                ]
            ];
        }
        if (isset($carts[$id])) {
            $carts[$id]['quantity'] += 1;
            session()->put('cart', $carts);
            return redirect()->back();
        }
        $carts[$id] = [
            'name' => $food->name,
            'price' => $food->price,
            'quantity' => 1,
            'img' => $food->img,
        ];
        session()->put('cart', $carts);
        return redirect()->back();
    }

    public function deleteCart($id)
    {
        $carts = session()->get('cart');
        unset($carts[$id - 1]);
//        dd($carts);
        session()->put('cart', $carts);
        // toastr()->success('delete cart success');
        return redirect()->back();
    }
}
