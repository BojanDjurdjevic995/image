<?php
namespace Baki\Image\Facades;

use Image;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Storage;

class ImageFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'StoreImage';
    }
    protected static function store($input_file, $storage_disk, $request, $defaultPictures, $width = false, $height = false, $edit = false, $imageOld = '')
    {
        if ($request->hasFile($input_file)) 
        {
            $image = $request->file($input_file);
            $name = time() . '.' . $image->getClientOriginalExtension();
            $makeImage = ($width && $height) ? Image::make($image)->fit($width, $height) : Image::make($image);
            $path = Storage::disk($storage_disk)->path($name);
            if(Storage::disk($storage_disk)->put($name, $makeImage->save($path)))
            {
                if($edit && $imageOld != NULL && $imageOld != $defaultPictures)
                {
                    Storage::disk($storage_disk)->exists($imageOld) ? Storage::disk($storage_disk)->delete($imageOld) : "";
                }
                return $name;  
            }
        }
        else
        {
            return $edit ? $imageOld : $defaultPictures;
        }
    }
}
