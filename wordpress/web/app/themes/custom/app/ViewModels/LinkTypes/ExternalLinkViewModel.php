<?php

namespace App\ViewModels\LinkTypes;

use App\Utilities\Fields;

class ExternalLinkViewModel implements LinkTypesViewModel
{
    public $type;
    public $text;
    public $url;


    public static function getSupportedComponentType()
    {
        return 'external_link';
    }

    public static function createFromPost($post)
    {
        $link = new ExternalLinkViewModel();
        $link->text = Fields::getField('text');
        $type = self::getSupportedComponentType();
        $link->type = $type;
        $link->url = Fields::getField('url');

        return $link;
    }
}
