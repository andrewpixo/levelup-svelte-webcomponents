<?php

namespace App\ViewModels\Components;

use App\Utilities\Fields;
use App\ViewModels\RepeaterViewModelFactory;
use App\ViewModels\FlexibleContentViewModelFactory;
use Timber\Post;
use App\ViewModels\Helpers\Image as ImageHelper;

class LinkListComponentViewModel implements ComponentViewModel
{

    public static function getSupportedComponentType()
    {
        return "link_list";
    }



    public static function createFromPost($post)
    {
        $viewModel = new LinkListComponentViewModel();
        $viewModel->type = 'link-list';
        $viewModel->header = Fields::getField("header");
        $viewModel->hideHeader = Fields::getField("hide_header");
        $viewModel->description = Fields::getField("description");
        $viewModel->linkLists = RepeaterViewModelFactory::createViewModels('lists', function() use ($post) {
            $list = new LinkListComponentViewModel();
            $list->heading = Fields::getField('heading');
            $list->links = FlexibleContentViewModelFactory::createViewModels($post, false, 'links', 'App\\ViewModels\\LinkTypes');

            return $list;
        });


        return $viewModel;
    }

}
