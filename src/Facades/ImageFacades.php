<?php
namespace Baki\Image\Facades;

use File;
use Image;
use Illuminate\Support\Facades\Input; 
use Illuminate\Support\Facades\Facade;

class ImageFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'StoreImage';
    }
    protected static function storeImage($nameOfInput, $path, $r, $defaultPictures, $width = false, $height = false)
    {
        if ($r->hasFile($nameOfInput)) 
        {
            $image = $r->file($nameOfInput);
            $name = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path($path . '' . $name);
            if (Image::make($image)->fit($width, $height)->save($location)) 
            {
                return $location . '' . $name;
            }           
        }
        else
        {
            return $defaultPictures;
        }
    }
    protected static function updateImage($nameOfInput, $path, $r, $imageOld = '', $w = false, $h=false)
    {
        if ($r->hasFile($nameOfInput)) 
        {
            $image = $r->file($nameOfInput);
            $name = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path($path . '' . $name);
            if (Image::make($image)->fit($width, $height)->save($location)) 
            {
                ($imageOld != NULL && $imageOld != $defaultPictures) ? (File::delete($imageOld)) : "";
                return $location . '' . $name;
            }           
        }
        else
        {
            return $imageOld;
        }
    }
}
