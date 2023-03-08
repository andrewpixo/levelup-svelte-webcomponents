<?php

namespace App\Fields\Components;

use App\ACF\FieldBuilder;
use App\ACF\FieldsBuilder;

class Text
{
    static function getFieldBuilder(): FieldsBuilder
    {
        $builder = new FieldsBuilder('text');

        $builder
            ->addText('header')
            ->setRequired();

        $builder->addTrueFalse('hide_header', [
            'ui' => 1,
        ])
            ->setLabel('Hide header')
            ->setInstructions('The header is required for screen readers but can be hidden from view if you like.');

        $builder
            ->addBlockRichText('rich_text')
                ->setLabel('Rich Text')
                ->setRequired();

        $imageBuilders = $builder
            ->addCaptionedConditionalImage('image');

        /** @var FieldBuilder $sliderBuilder */
        $sliderBuilder = $imageBuilders['slider'];
        $sliderBuilder->setInstructions('Add a half-width or one-third width photo, placed on the left or right of the text.');

        $imageBuilder = $imageBuilders['image'];
        $imageBuilder->setInstructions('Upload an image (square or portrait orientation will look best). The image you upload must be at least 500px wide.');
        $imageBuilder->setConfig('min_width', 500);

        $builder
            ->addButtonGroup('placement')
                ->conditional('add_image', '==', '1')
                ->setInstructions('Choose the positioning of the photo. The text will wrap around the photo.')
                ->addChoice('left', 'Left')
                ->addChoice('right', 'Right')
                ->setWidth('50%')
                ->setRequired(true);

        $builder
            ->addButtonGroup('size')
                ->conditional('add_image', '==', '1')
                ->setInstructions('Choose the size of the photo. (If you want to add a full-width image, use an Image component.)')
                ->addChoice('half', '1/2 width')
                ->addChoice('third', '1/3 width')
                ->setWidth('50%')
                ->setRequired(true);

        return $builder;
    }
}
