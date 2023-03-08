<?php

namespace App\ViewModels;

use App\Utilities\DateFormatter;
use Timber\Image;
use Timber\Post;

class NewsStoryViewModel
{
    public $title;
    public $featuredImage;
    public $summary;
    public $relatedLinks;
    public $components;
    public $permalink;

    public static function createFromPost(Post $post)
    {
        $viewModel = new NewsStoryViewModel();
        $viewModel->permalink = $post->link;
        $viewModel->title = $post->post_title;
        $date = new \DateTime($post->post_date);
        $viewModel->date = DateFormatter::getDateStringFromDate($date);
        $viewModel->summary = wpautop($post->summary);
        $imageSrc = (new Image($post->featured_image))->src();
        if ($imageSrc !== false) {
            $viewModel->featuredImage = [
                'src' => $imageSrc,
                'altText' => $post->featured_image_alt_text,
                'caption' => $post->featured_image_caption
            ];
        }

        $viewModel->components = FlexibleContentViewModelFactory::createViewModels($post);

        return $viewModel;
    }
}
