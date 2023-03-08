<?php

namespace App\Utilities;

class ImageDimensionCalculator
{
    public $dimensionWidths;

    public function __construct($dimensionWidths = array())
    {
        $this->dimensionWidths = $dimensionWidths;
    }

    public function getDimensionsForAspectRatio(float $ratio)
    {
        $dimensions = [];

        foreach ($this->dimensionWidths as $width) {
            $dimensions []=
                [ 'width' => $width, 'height' => $this->getHeightFromWidthAndRatio($width, $ratio)]
            ;
        }
        return $dimensions;
    }

    public function getHeightFromWidthAndRatio($width, $ratio)
    {
        return $width / $ratio;
    }

    public static function getRatioUnit($width, $height)
    {
        return $width / $height;
    }
}
