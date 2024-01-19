<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Session;

class WishlistController extends Controller
{
    public function index()
    {
        return view('website.wishlist.index');
    }

    public function create($id)
    {
        Wishlist::newWishlist($id);
        return back()->with('message', 'Wishlist added  successful');
    }

    public function remove($id)
    {
        Wishlist::removeWishlist($id);
        return back()->with('message', 'Remove successful from wishlist.');
    }
}
