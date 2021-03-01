<?php

    function daysDiff($from_date, $to_date){
            $from_date = new DateTime($from_date);
            $to_date = new DateTime($to_date);
            $interval = $from_date->diff($to_date);
            $days = $interval->format('%d');
            $days = $days + 1;
            return $days;
        }

    function storeImage($dir, $file, $name, $width, $height){
        
        $image_webp = Image::make($file)->fit($width, $height)->encode('webp');
        $image_jpg = Image::make($file)->fit($width, $height)->encode('jpg');

        Storage::put(config('constants.' . $dir) . '/' . $name . '.webp', $image_webp);
        Storage::put(config('constants.' . $dir) . '/' . $name . '.jpg', $image_jpg);
        //$picture->storeAs(config('constants.user_images_dir'), $picture_name);
    }

    function deleteImage($dir, $name){
        Storage::delete(config($dir) . $name);
    }
