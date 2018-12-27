<?php
include 'PHPAndroidLogoResizer.php';

$filePath = $argv[1];
$fileNameArray = explode(DIRECTORY_SEPARATOR, $filePath);
$fileName = end($fileNameArray);
$filePathWithoutFileName = str_replace($fileName, '', $filePath);
$iconName = isset($argv[2]) ? $argv[2] . '.png' : 'ic_launcher.png';

try {
    $fileHdpi = PHPAndroidLogoResizer::resize_imagepng($filePath, 48, 48);
    $fileMhdpi = PHPAndroidLogoResizer::resize_imagepng($filePath, 72, 72);
    $fileXhdpi = PHPAndroidLogoResizer::resize_imagepng($filePath, 96, 96);
    $fileXxhdpi = PHPAndroidLogoResizer::resize_imagepng($filePath, 144, 144);
    $fileXxxhdpi = PHPAndroidLogoResizer::resize_imagepng($filePath, 192, 192);

    $mipmapHdpiPath = $filePathWithoutFileName . DIRECTORY_SEPARATOR . 'mipmap-hdpi';
    $mipmapMdpiPath = $filePathWithoutFileName . DIRECTORY_SEPARATOR . 'mipmap-mdpi';
    $mipmapXhdpiPath = $filePathWithoutFileName . DIRECTORY_SEPARATOR . 'mipmap-xhdpi';
    $mipmapXxhdpiPath = $filePathWithoutFileName . DIRECTORY_SEPARATOR . 'mipmap-xxhdpi';
    $mipmapXxxhdpiPath = $filePathWithoutFileName . DIRECTORY_SEPARATOR . 'mipmap-xxxhdpi';

    if (!file_exists($mipmapHdpiPath))
        mkdir($mipmapHdpiPath);

    if (!file_exists($mipmapMdpiPath))
        mkdir($mipmapMdpiPath);

    if (!file_exists($mipmapXhdpiPath))
        mkdir($mipmapXhdpiPath);

    if (!file_exists($mipmapXxhdpiPath))
        mkdir($mipmapXxhdpiPath);

    if (!file_exists($mipmapXxxhdpiPath))
        mkdir($mipmapXxxhdpiPath);

    imagepng($fileHdpi, $mipmapHdpiPath . DIRECTORY_SEPARATOR . $iconName);
    echo 'Icon created at ' . $mipmapHdpiPath . DIRECTORY_SEPARATOR . $iconName . PHP_EOL;

    imagepng($fileMhdpi, $mipmapMdpiPath . DIRECTORY_SEPARATOR . $iconName);
    echo 'Icon created at ' . $mipmapMdpiPath . DIRECTORY_SEPARATOR . $iconName . PHP_EOL;

    imagepng($fileXhdpi, $mipmapXhdpiPath . DIRECTORY_SEPARATOR . $iconName);
    echo 'Icon created at ' . $mipmapXhdpiPath . DIRECTORY_SEPARATOR . $iconName . PHP_EOL;

    imagepng($fileXxhdpi, $mipmapXxhdpiPath . DIRECTORY_SEPARATOR . $iconName);
    echo 'Icon created at ' . $mipmapXxhdpiPath . DIRECTORY_SEPARATOR . $iconName . PHP_EOL;
    
    imagepng($fileXxxhdpi, $mipmapXxxhdpiPath . DIRECTORY_SEPARATOR . $iconName);
    echo 'Icon created at ' . $mipmapXxxhdpiPath . DIRECTORY_SEPARATOR . $iconName . PHP_EOL;

    echo 'Completed!';
} catch (Exception $e) {
    echo 'Failed to generate icons. Error: ' . $e->getMessage();
}