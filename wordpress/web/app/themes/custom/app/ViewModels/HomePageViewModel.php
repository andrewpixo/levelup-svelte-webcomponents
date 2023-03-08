<?php

namespace App\ViewModels;

use App\Utilities\Fields;
use App\ViewModels\Helpers\CallToActionButton;

class HomePageViewModel
{
    public $title;
    public $intro;
    public $components;
    public $ctaOne;
    public $ctaTwo;

    public static function createFromPost($post): HomePageViewModel
    {
        $model = new HomePageViewModel();

        $model->title = Fields::getField('title');
        $model->intro = Fields::getField('home_intro');
        $model->ctaOne = CallToActionButton::createModel('home_call_to_action_one');
        $model->ctaTwo = CallToActionButton::createModel('home_call_to_action_two');
        $model->components = FlexibleContentViewModelFactory::createViewModels($post, 'option');

        return $model;
    }
}
