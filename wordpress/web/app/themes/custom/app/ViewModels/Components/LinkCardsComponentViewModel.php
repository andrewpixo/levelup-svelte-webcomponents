<?php

namespace App\ViewModels\Components;

use App\Utilities\Fields;
use App\ViewModels\RepeaterViewModelFactory;
use App\ViewModels\FlexibleContentViewModelFactory;

class LinkCardsComponentViewModel implements ComponentViewModel
{

    public static function getSupportedComponentType()
    {
        return "link_cards";
    }

    public static function createFromPost($post)
    {
        $viewModel = new LinkCardsComponentViewModel();
        $viewModel->type = 'link-cards';
        $viewModel->header = Fields::getField("header");
        $viewModel->hideHeader = Fields::getField("hide_header");
        $viewModel->description = Fields::getField("description");
        $viewModel->linkCards = RepeaterViewModelFactory::createViewModels('cards', function() use ($post) {
            $card = new LinkCardsComponentViewModel();
            $link = FlexibleContentViewModelFactory::createViewModels($post, false, 'links', 'App\\ViewModels\\LinkTypes');
            $card->link = $link[0];
            $card->description = Fields::getField('description');
            $card->image = Fields::getField('image');
            $card->altText = Fields::getField('image_alt_text');
            $card->imageToggle = Fields::getField('add_image');
            return $card;
        });
        return $viewModel;
    }
}
