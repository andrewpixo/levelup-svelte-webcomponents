<?php

namespace App\Utilities;

class ManageMimeTypes
{
    public static function addMimeType($type, $protocol)
    {
        add_filter('wp_check_filetype_and_ext', function ($types, $file, $filename) use ($type, $protocol) {
            if (false !== strpos($filename, ".{$type}")) {
                $types['ext'] = $type;
                $types['type'] = $protocol;
            }
            return $types;
        }, 10, 4);

        add_filter('upload_mimes', function ($mimes) use ($type, $protocol) {
            $mimes[$type] = $protocol;
            return $mimes;
        });
    }
}
