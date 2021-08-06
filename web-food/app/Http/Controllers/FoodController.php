<?php

namespace App\Http\Controllers;

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
        return view('backend.admin.food.list',compact('foods'));
    }

    public function create()
    {
        $tags=Tags::all();
        $categories=Categories::all();
        return view('');

    }

    public function store()
    {

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
