<?php

class PHPAndroidLogoResizer {
    public static function resize_imagepng($file, $w, $h) {
        list($width, $height) = getimagesize($file);
        $src = imagecreatefrompng($file);
        $dst = imagecreatetruecolor($w, $h);
        imagealphablending($dst, FALSE);
        imagesavealpha($dst, TRUE);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
        return $dst;
     } 
}