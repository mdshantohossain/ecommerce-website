<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public $products;

    public function search(Request $request)
    {
        $this->products = Product::where('category_id', $request->category_id)
            ->orWhere('name', 'LIKE', '%'. $request->search.'%')
            ->get();

        return view('website.search.index', ['products' => $this->products]);
    }

    public function searchProduct($products)
    {


    }
}
