<?php
namespace App\Http\Controllers\user;
use App\Http\Repositories\FoodRepository;

class FoodController
{
    protected $foodRepository;

    public function __construct(FoodRepository $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }
    public function index()
    {
        $foods = $this->foodRepository->getAll();
        return view('frontend.list', compact('foods'));
    }
}
