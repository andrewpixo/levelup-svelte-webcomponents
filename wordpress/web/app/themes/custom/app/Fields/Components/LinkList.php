<?php

namespace App\Fields\Components;

use App\ACF\FieldBuilder;
use App\ACF\FieldsBuilder;

class LinkList
{
    static function getFieldBuilder(): FieldsBuilder
    {
        $builder = new FieldsBuilder('link_list');

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

        $linkListBuilder = $builder->addRepeater('lists', [
            'label' => 'Link Lists',
            'min' => 1,
            'layout' => 'block',
            'button_label' => 'Add a Link List'
            ])
                ->addText('heading');
        $linkField = new FieldsBuilder('link_field');
        $linkField->addLinkTypes('links');

        $linkListBuilder
            ->addFields($linkField);
        $linkListBuilder
            ->endRepeater();
        return $builder;
    }
}
