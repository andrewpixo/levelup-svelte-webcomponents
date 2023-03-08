<?php

namespace App\Fields\Layouts;

use App\ACF\FieldsBuilder;

class PageLink
{
    public static function getFieldBuilder(): FieldsBuilder
    {

        $builder = new FieldsBuilder('page_link');

        $builder
            ->addText('text')
                ->setLabel('Link Text')
                ->setWidth('50%')
                ->setRequired()
            ->addPageLink('page')
                ->setLabel('Page')
                ->setWidth('50%')
                ->setRequired();

        return $builder;
    }
}
