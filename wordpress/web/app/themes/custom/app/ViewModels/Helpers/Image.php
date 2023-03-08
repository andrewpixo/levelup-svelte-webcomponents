<?php

namespace App\ViewModels\Helpers;

use App\Utilities\Fields;

class Image
{
    public $src;
    public $altText;
    public $caption;
    public $mimeType;
    public $naturalWidth;
    public $naturalHeight;

    public static function createConditionalModel(): ?Image
    {
        $image = self::getFieldData();
        return self::build($image);
    }

    public static function createModel(): ?Image
    {
        $image = self::getFieldData(true);
        return self::build($image);
    }

    public function __construct($image)
    {
        $this->src = $image->src;
        $this->altText = $image->altText;
        $this->mimeType = $image->mimeType;
        $this->naturalWidth = $image->naturalWidth;
        $this->naturalHeight = $image->naturalHeight;
        if ($image->caption) {
            $this->caption = $image->caption;
        } else {
            unset($this->caption);
        }
    }

    public static function getFieldData($isEnabled = false): \stdClass
    {
        $image = new \stdClass();
        $image->enabled = $isEnabled ?: Fields::getField('add_image');
        if ($image->enabled) {
            $image->src = (new \Timber\Image(Fields::getField('image')['id']))->src();
            $image->altText = Fields::getField('image_alt_text');
            $image->caption = Fields::getField('image_caption');
            $image->mimeType = Fields::getField('image')['mime_type'];
            $image->naturalWidth = Fields::getField('image')['width'];
            $image->naturalHeight = Fields::getField('image')['height'];
        }
        return $image;
    }

    public static function build($image): ?Image
    {
        return $image->enabled ? new Image($image) : null;
    }
}

