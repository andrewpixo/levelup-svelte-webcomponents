<?php

namespace App\ViewModels;

use App\Utilities\Fields;

class LandingPageViewModel
{
    public $components;
    public $title;
    public $tiles;
    public $introText;

    public static function createFromPost($post): LandingPageViewModel
    {
        $model = new LandingPageViewModel();

        $model->title = $post->title;
        $model->introText = Fields::getField('intro_text');
        $model->tiles = RepeaterViewModelFactory::createViewModels('tiles', function() {
            return (object) [
                'title' => Fields::getField('link_title'),
            ];
        }, 'option');
        $model->components = FlexibleContentViewModelFactory::createViewModels($post);

        return $model;
    }
}
