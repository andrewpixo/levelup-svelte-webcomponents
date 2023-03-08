<?php

namespace App\ViewModels\Components;

use Timber\Post;

interface ComponentViewModel
{
    public static function getSupportedComponentType();

    public static function createFromPost(Post $post);
}
