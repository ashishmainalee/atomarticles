<?php

    use Image as Img;

    function imagePath($image, $path)
    {
        if($image) {
            return '/uploads'. '/' .$path. '/' . $image;
        }

        return '/uploads/default.jpg';
    }

    function uploadImage($image, $path, $width="", $height="")
    {
        // $image = $request->file('profile_image');
        $fileExtension   = strtolower($image->getClientOriginalExtension());
        $file_name       = sha1(uniqid().$image.uniqid()).'.'.$fileExtension;

        $destinationPath = 'uploads/' .$path. '/';

        $img = Img::make($image->getRealPath());
        $img->resize($width, $height)->save($destinationPath.$file_name);

        return $img->basename;
    }

    function deleteImage($image, $path)
    {
        $root = realpath($_SERVER['DOCUMENT_ROOT']);
        $old_image = $root . imagePath($image, $path);
        if(unlink($old_image)){
            return true;
        }
        return false;
    }

    function updateNewImageOrKeepOld($newImage, $oldImage, $path, $width, $height)
    {
        if($newImage) {
            if($oldImage)
            {
               deleteImage($oldImage, $path);
            }
            return uploadImage($newImage, $path, $width, $height);
        } else {
           return  $oldImage;
        }

    }
