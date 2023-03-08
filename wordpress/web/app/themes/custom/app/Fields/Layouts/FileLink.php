<?php

namespace App\Fields\Layouts;

use App\ACF\FieldsBuilder;

class FileLink
{
    public static function getFieldBuilder(): FieldsBuilder
    {

        $builder = new FieldsBuilder('file_link');

        $builder
            ->addText('text')
                ->setLabel('Link Text')
                ->setWidth('50%')
                ->setRequired()
            ->addFile('file')
                ->setLabel('File')
                ->setWidth('50%')
                ->setRequired();

        return $builder;
    }
}
