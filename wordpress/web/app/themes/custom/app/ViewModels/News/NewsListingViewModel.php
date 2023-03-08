<?php

namespace App\ViewModels;

use Timber\Post;

class NewsListingViewModel
{
    public static function createFromPost($post)
    {
        $model = new NewsListingViewModel();

        $model->title = $post->title;

        if($post->featured_story !== "") {
            $model->featuredStory = NewsStoryViewModel::createFromPost(new Post($post->featured_story));
        }

        return $model;
    }
}
