<?php

namespace App\ViewModels\LinkTypes;

use Timber\Post;

interface LinkTypesViewModel
{
    public static function getSupportedComponentType();

    public static function createFromPost(Post $post);
}
