Before installing this package, install Intervention Image
```
composer require intervention/image
```
Require this package with composer:
```
composer require baki/image
```
# Usage
To use Image package, use this in your controller
```
use StoreImage;
```
After that, create your disk in config/filesystems.php
```
'yourDisk' => [
            'driver' => 'local',
            'root' => storage_path('app/public/your-directory'),
            'url' => env('APP_URL').'/your-directory',
            'visibility' => 'public',
        ],
```
# Example
If you want to save your pictures (eg. for your News) and get the name of those pictures <br/>
Follow this command:
```
{{-- Input in laravel blade --}}
<input type="file" name="your_name_for_input">

// Function to store your news and pictures
public function store(Request $r)
{
    $input = new News;
    
    // It is without crop image
    $input->image = StoreImage::store('your_input_name', 'yourDisk', $request, 'default-pictures.jpg');
    
    // It is with crop image
    $input->image = StoreImage::store('your_input_name', 'yourDisk', $request, 'default-pictures.jpg', 450, 430);
    
    // First number is for width and second number is for height
    
    $input->save();
    return redirect()->route('news.index'); // This is my route. You can use your route.
}
```

If you want to edit your news. Old pictures will be delete, but default pictures will not be delete <br/>
Follow command:
```
$news->image = StoreImage::store('your_input_name', 'yourDisk', $request, 'default-pictures.jpg', 'width', 'height', true(for edit), $news->old_image_from_database(enter if the previous parameter is true));

// Function to update your news and pictures
public function update(Request $r, News $news)
{
    // It is without crop image and you must enter 'false, false' to no crop image and true to edit news.
    $news->image = StoreImage::store('your_input_name', 'yourDisk', $request, 'default-pictures.jpg', false, false, true, $news->old_image_from_database);
    
    // It is with crop image
    $news->image = StoreImage::store('your_input_name', 'yourDisk', $request, 'default-pictures.jpg', 'width', 'height', true, $news->old_image_from_database);
    
    // First number is for width and second number is for height
    
    $news->save();
    return redirect()->route('news.index'); // It is my route. You can use your route.
}
```
