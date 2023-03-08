<?php

namespace App\Fields\Components;

use App\ACF\FieldsBuilder;

class Image
{
    public static function getFieldBuilder(): FieldsBuilder
    {

        $builder = new FieldsBuilder('image');

        $imageBuilders = $builder->addCaptionedImage('image');

        $imageBuilders['image']
            ->setInstructions('Upload an image (landscape orientation will look best). Make sure to compress images before uploading to ensure the best performance. We recommend using <a href="https://tinyjpg.com/" target="_blank" rel="noreferrer">TinyJPG</a>.')
            ->setConfig('max_size', '10MB')
            ->setConfig('min_width', '100px')
            ->setConfig('max_width', '5000px');

        return $builder;
    }
}
