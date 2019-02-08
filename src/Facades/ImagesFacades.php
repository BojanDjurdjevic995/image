<?php
namespace Baki\Gallery\Facades;

use File;
use Image;
use Illuminate\Support\Facades\Input; 
use Illuminate\Support\Facades\Facade;
/**
 * @see \Mews\Purifier
 */
class ImagesFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'StoreImages';
    }
    protected static function storeImage($nameOfInput, $path, $r, $defaultPictures, $w = false, $h=false)
    {
        if ($r->hasFile($nameOfInput)) 
        {
            $image = $r->file($nameOfInput);
            $name = time().'.'.$image->getClientOriginalExtension();
            $location = public_path($path.$name);
            if (Image::make($image)->fit($w, $h)->save($location)) 
            {
                return $location.$name;
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
            $name = time().'.'.$image->getClientOriginalExtension();
            $location = public_path($location.$name);
            if (Image::make($image)->fit($w, $h)->save($location)) 
            {
                ($imageOld != NULL && $imageOld != $defaultPictures) ? (File::delete($imageOld)) : "";
                return $lokacija.$name;
            }           
        }
        else
        {
            return $imageOld;
        }
    }
}
