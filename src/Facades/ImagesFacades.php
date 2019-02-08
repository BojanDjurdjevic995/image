<?php
namespace Baki\Gallery\Facades;
use File;
use Image;
use App\Gallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input; 
use Illuminate\Support\Facades\Facade;
/**
 * @see \Mews\Purifier
 */
class GalleryFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'StoreGallery';
    }
    protected static function storeImage($nameOfInput, $location, $r, $defaultPictures, $edit = false, $imageOld = '')
    {
        if ($r->hasFile($nameOfInput)) 
        {
            $image = $r->file($nameOfInput);
            $name = time().'.'.$image->getClientOriginalExtension();
            $location = public_path($location.$name);
            if (Image::make($image)->fit(790, 440)->save($location)) 
            {
                ($edit) ? (($imageOld != NULL && $imageOld != $defaultPictures) ? File::delete($imageOld) : "") : "";
                return $lokacija.$name;
            }           
        }else
        {
            return $edit ? $imageOld : $defaultPictures;
        }
    }
}
