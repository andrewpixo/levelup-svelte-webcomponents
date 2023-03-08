<?php

namespace App\ViewModels\LinkTypes;

use App\Utilities\Fields;

class FileLinkViewModel implements LinkTypesViewModel
{
    public $type;
    public $text;
    public $url;


    public static function getSupportedComponentType()
    {
        return 'file_link';
    }

    public static function createFromPost($post)
    {
        $link = new FileLinkViewModel();
        $link->text = Fields::getField('text');
        $type = self::getSupportedComponentType();
        $link->type = $type;

        $file = Fields::getField('file');
        $link->url = $file['url'];
        $link->fileType = self::getFileExtensionFromFilename($file['filename']);
        $link->fileSize = self::formatBytes($file['filesize']);

        return $link;
    }

    public static function getFileExtensionFromFilename($filename)
    {
        $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
        $extensionToUpperCase = strtoupper($fileExtension);
        return $extensionToUpperCase;
    }

    private static function formatBytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
