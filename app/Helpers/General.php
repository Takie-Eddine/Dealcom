<?php
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;

if (!function_exists('uploadImage')) {

    /**
     * description
     *
     * @param
     * @return
     */

        function uploadImage($photo, $folder, $name)
        {
            $file_name = Str::slug($name).".".$photo->getClientOriginalExtension();
                $path = public_path('assets/images/'.$folder.'/' .$file_name);
                Image::make($photo->getRealPath())->resize(500,null,function($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);
                return $file_name;
        }


        function UnlinkImage($folder, $name, $value){
            if(File::exists('assets/images/'.$folder.'/'.$name) && $name) {
                unlink('assets/images/'.$folder.'/'.$name);
                $name = null ;
                $value->save();
            }

        }


        function uploadSlider($photo, $folder, $name)
        {
            $file_name = Str::slug($name).".".$photo->getClientOriginalExtension();
                $path = public_path('assets/images/'.$folder.'/' .$file_name);
                Image::make($photo->getRealPath())->save($path);
                return $file_name;
        }


        function tree($category){
            $categories = [];
            if ($category->children->empty()) {
                $categories[] = $category->id;
            }
            foreach ($category->children as $child) {
                $categories = array_merge($categories, tree($child));
            }

            return $categories;
        }
    }
