<?php

namespace App\Fields\Layouts;

use App\ACF\FieldsBuilder;

class ExternalLink
{
    public static function getFieldBuilder(): FieldsBuilder
    {

        $builder = new FieldsBuilder('external_link');

        $builder
            ->addText('text')
                ->setLabel('Link Text')
                ->setWidth('50%')
                ->setRequired()
            ->addUrl('url')
                ->setLabel('URL')
                ->setWidth('50%')
                ->setRequired();

        return $builder;
    }
}
