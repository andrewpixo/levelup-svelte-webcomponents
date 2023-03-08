<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;

class News extends Post
{
    /**
     * Return the key used to register the post type with WordPress
     * First parameter of the `register_post_type` function:
     * https://codex.wordpress.org/Function_Reference/register_post_type
     *
     * @return string
     */
    public static function getPostType()
    {
        return 'news';
    }

    /**
     * Return the config to use to register the post type with WordPress
     * Second parameter of the `register_post_type` function:
     * https://codex.wordpress.org/Function_Reference/register_post_type
     *
     * @return array|null
     */
    protected static function getPostTypeConfig()
    {
        return [
            'labels' => [
                'name' => __('News'),
                'singular_name' => __('News Article'),
                'add_new_item' => __('Add News Article'),
            ],
            'public' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'author'),
            'rewrite' => [
                'slug' => 'about-us/news'
            ]
        ];
    }
}
