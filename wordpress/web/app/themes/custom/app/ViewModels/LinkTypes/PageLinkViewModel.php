<?php

namespace App\ViewModels\LinkTypes;

use App\Utilities\Fields;

class PageLinkViewModel implements LinkTypesViewModel
{
    public $type;
    public $text;
    public $url;


    public static function getSupportedComponentType()
    {
        return 'page_link';
    }

    public static function createFromPost($post)
    {
        $link = new PageLinkViewModel();
        $link->text = Fields::getField('text');
        $type = self::getSupportedComponentType();
        $link->type = $type;
        $link->url = Fields::getField('page');

        return $link;
    }
}
