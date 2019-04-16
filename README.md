Before install this package, you must install Intervention Image
```
composer require intervention/image
```
Require this package with composer:
```
composer require baki/image
```
# Usage
For use Image package you must use this in our controller
```
use StoreImage;
```
After that, you must create your disk in config/filesystems.php
```
'yourDisk' => [
            'driver' => 'local',
            'root' => storage_path('app/public/your-directory'),
            'url' => env('APP_URL').'/your-directory',
            'visibility' => 'public',
        ],
```
# Example
If you want to save your pictures (eg. for you News) and get name of pictures
Follow this command:
```
{{-- Input in laravel blade --}}
<input type="file" name="your_name_for_input">

// Function to store your news and pictures
public function store(Request $r)
{
    $input = new News;
    
    // This is witout fit image
    $input->image = StoreImage::store('your_name_for_input', 'yourDisk', $request, 'default-pictures.jpg');
    
    // This is with fit image
    $input->image = StoreImage::store('your_name_for_input', 'yourDisk', $request, 'default-pictures.jpg', 450, 430);
    
    // First number is for width and second number is for height
    
    $input->save();
    return redirect()->route('news.index'); // This is my route. You can use your route.
}
```

If you want to edit your news. Old pictures will be delete, but default pictures will not be delete
Follow command:
```
// Function to update your news and pictures
public function update(Request $r, News $news)
{
    // This is witout fit image and you must enter false, false to nocrop image and true to edit news.
    // 
    $news->image = StoreImage::store('your_name_for_input', 'yourDisk', $request, 'default-pictures.jpg', false, false, true, $news->old_image_from_database);
    
    // This is with fit image
    $news->image = StoreImage::store('your_name_for_input', 'yourDisk', $request, 'default-pictures.jpg', 450, 430, true, $news->old_image_from_database);
    
    // First number is for width and second number is for height
    
    $news->save();
    return redirect()->route('news.index'); // This is my route. You can use your route.
}
```
