<?php

namespace App\ViewModels;

class MenuItemViewModel
{
    public static function createFromPost($post)
    {
        $viewModel = new MenuItemViewModel();
        $viewModel->title = $post->title;
        $viewModel->url = $post->url;
        $viewModel->isActive = $post->current;
        $viewModel->isChildActive = $post->current_item_parent;
        $viewModel->isDescendantActive = $post->current_item_ancestor;
        $viewModel->children = collect($post->children)
            ->map(function($child) {
                return MenuItemViewModel::createFromPost($child);
            })
            ->toArray();

        return $viewModel;
    }
}
