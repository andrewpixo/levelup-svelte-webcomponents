<?php

namespace App\ViewModels;

use App\Utilities\Fields;
use App\ViewModels\Helpers\Image;

class PageViewModel
{

    public static function createFromPost($post)
    {
        $model = new PageViewModel();

        $model->title = $post->title;
        $model->introText = Fields::getField('intro_text');
        $addImage = Fields::getField('add_image');
        $model->addImage = $addImage;

        if($addImage) {
            $model->featuredImage = Image::createConditionalModel();
        }

        $model->components = FlexibleContentViewModelFactory::createViewModels($post);

        return $model;
    }
}
