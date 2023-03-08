<?php

namespace App\ViewModels;

class MenuViewModel
{
    public static function createFromPost($post)
    {
        $viewModel = new MenuViewModel();

        $menu = collect($post->items())
            ->map(function ($item) {
                return MenuItemViewModel::createFromPost($item);
            })
            ->toArray();
        $currentPageInMenu = false;
        foreach ($menu as $item) {
            if (($item->isActive == true) or ($item->isDescendantActive == true)) {
                $currentPageInMenu = true;
            }
        }
        $viewModel->items = $menu;
        $viewModel->currentPageInMenu = $currentPageInMenu;

        return $viewModel;
    }
}
