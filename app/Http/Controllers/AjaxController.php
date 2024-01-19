<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index()
    {
        $product = Product::find($_GET['id']);
        $product->hit_count = $product->hit_count + 1;
        $product->save();


        return json_encode($product);
    }
}

