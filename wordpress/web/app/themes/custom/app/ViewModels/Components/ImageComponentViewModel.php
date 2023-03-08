<?php

namespace App\ViewModels\Components;

use Timber\Post;
use App\ViewModels\Helpers\Image as ImageHelper;

class ImageComponentViewModel implements ComponentViewModel
{
    public $type;
    public $image;

    public static function getSupportedComponentType(): string
    {
        return 'image';
    }

    public static function createFromPost(Post $post): ImageComponentViewModel
    {
        $viewModel = new ImageComponentViewModel();
        $viewModel->type = self::getSupportedComponentType();
        $viewModel->image = ImageHelper::createModel();

        return $viewModel;
    }
}
