<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;

    private static $otherImage, $image, $imageUrl, $imageName, $directory, $extension;


    public static function getImageUrl($image)
    {
        self::$extension = $image->getClientOriginalExtension();
        self::$imageName = rand(0000000, 9999999).'.'. self::$extension;
        self::$directory = 'other-images/';
        $image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory. self::$imageName;

        return self::$imageUrl;
    }

    public static function newOtherImage($request, $id)
    {

        foreach ($request->file('other_image') as $image)
        {
            self::$otherImage = new OtherImage();
            self::$otherImage->product_id =  $id;
            self::$otherImage->image = self::getImageUrl($image);
            self::$otherImage->save();
        }
    }

    public static function updateOtherImage($request, $id)
    {
        self::$otherImage = OtherImage::where('product_id', $id)->get();

        foreach (self::$otherImage as $image)
        {
            if (file_exists($image->image))
            {
                unlink($image->image);
            }
            $image->delete();
        }

        self::newOtherImage($request, $id);
    }

    public static function deleteOtherImage($id)
    {
        self::$otherImage = OtherImage::where('product_id', $id)->get();

        foreach (self::$otherImage as $item)
        {
            if ($item->image)
            {
                unlink($item->image);
            }
            $item->delete();
        }

    }
}
