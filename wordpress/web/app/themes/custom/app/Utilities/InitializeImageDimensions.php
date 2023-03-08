<?php

use App\Utilities\ImageDimensionCalculator;

add_filter(
    'timber/twig',
    function ($twig) {
        $twig->addFunction(
            new \Timber\Twig_Function('getDimensions', function ($designWidth, $designHeight) {
                $calculator = new ImageDimensionCalculator([1600, 1200, 800, 400]);
                $aspectRatio = ImageDimensionCalculator::getRatioUnit($designWidth, $designHeight);
                return $calculator->getDimensionsForAspectRatio($aspectRatio);
            })
        );

        $twig->addFunction(
            new \Timber\Twig_Function('getNewHeightBasedOnAspectRatio', function ($originalWidth, $originalHeight, $newWidth) {
                return $newWidth * $originalHeight / $originalWidth;
            })
        );

        return $twig;
    }
);
