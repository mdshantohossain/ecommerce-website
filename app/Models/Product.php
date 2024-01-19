<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;

    private static $product, $image, $imageName, $imageUrl, $directory, $extension;


    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'. self::$extension;
        self::$directory = 'product-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory. self::$imageName;

        return self::$imageUrl;
    }

    public static function newProduct($request)
    {
        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->name = $request->name;
        self::$product->code = $request->code;
        self::$product->stoke_amount = $request->stoke_amount;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->image = self::getImageUrl($request);
        self::$product->save();

        return self::$product;
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);

        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }else{
            self::$imageUrl = self::$product->image;
        }

        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->name = $request->name;
        self::$product->code = $request->code;
        self::$product->stoke_amount = $request->stoke_amount;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->image = self::$imageUrl;
        self::$product->save();
    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory(): BelongsTo
    {
        return  $this->belongsTo(SubCategory::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function brand(): BelongsTo
    {
        return  $this->belongsTo(Brand::class);
    }

    public function otherImages(): HasMany
    {
        return  $this->hasMany(OtherImage::class);
    }
}
