<?php

namespace App\ViewModels;

use App\Utilities\DateFormatter;
use App\Utilities\TaxonomyHelper;
use Rareloop\Lumberjack\Post;
use Timber\Image;

class NewsCardViewModel {
    public static function createFromPost($post)
    {
        $model = new NewsCardViewModel();

        $model->permalink = $post->link;
        $model->title = $post->post_title;
        $date = new \DateTime($post->post_date);
        $model->publishDate = DateFormatter::getDateStringFromDate($date);
        $imageSrc = (new Image($post->featured_image))->src();
        if ($imageSrc !== false) {
            $model->featuredImage = [
                'src' => $imageSrc,
                'altText' => $post->featured_image_alt_text
            ];
        }

        return $model;
    }
}
