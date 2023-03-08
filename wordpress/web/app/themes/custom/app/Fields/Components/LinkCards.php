<?php

namespace App\Fields\Components;

use App\ACF\FieldsBuilder;

class LinkCards
{
    static function getFieldBuilder(): FieldsBuilder
    {
        $builder = new FieldsBuilder('link_cards');

        $builder
            ->addText('header')
            ->setWidth("60%")
            ->setRequired();

        $builder->addTrueFalse('hide_header', [
            'ui' => 1,
        ])
            ->setLabel('Hide header')
            ->setWidth("40%")
            ->setInstructions('The header is required for screen readers but can be hidden from view if you like.');

        $builder->addInlineRichText('description');

        $cardListBuilder = $builder->addRepeater('cards', [
            'label' => 'Cards',
            'min' => 1,
            'layout' => 'block',
            'button_label' => 'Add a Link Card'
        ]);

        $imageField = new FieldsBuilder('image_field');
        $imageField->addConditionalImage('image');

        $linkField = new FieldsBuilder('link_cards');
        $linkField->addLinkTypes('links', [
            'min' => 1,
            'max' => 1,
            'button_label' => 'Choose link type',
            'label' => 'Link'
        ]);

        $cardListBuilder
            ->addFields($linkField)
            ->addText('description')
            ->addFields($imageField)
            ->endRepeater();
        return $builder;
    }
}
