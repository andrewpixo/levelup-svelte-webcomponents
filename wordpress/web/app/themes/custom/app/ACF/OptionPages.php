<?php

namespace App\ACF;

class OptionPages
{
    public static function initialize()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title' => 'Site Settings',
                'menu_title' => 'Site Settings',
                'menu_slug' => 'site-general-settings',
                'capability' => 'edit_posts',
                'redirect' => false
            ));

            acf_add_options_page(array(
                'page_title' => 'Homepage Settings',
                'menu_title' => 'Homepage',
                'menu_slug' => 'homepage-settings',
                'capability' => 'edit_posts',
                'redirect' => false
            ));
        }
    }
}
