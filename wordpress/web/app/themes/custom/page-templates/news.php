<?php

/**
 * Template Name: News Listing
 *
 */

namespace App;

use App\Http\Controllers\Controller;
use App\ViewModels\NewsCardViewModel;
use App\ViewModels\NewsListingViewModel;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;

class NewsController extends Controller
{
    public function handle()
    {
        $context = $this->getContext();

        $post = new Post();
        $context['post'] = NewsListingViewModel::createFromPost($post);
        $context['background'] = 'dark';

        $viewModelBuilder = function($news) {
            return NewsCardViewModel::createFromPost($news);
        };

        $queryOptions = [
            'orderby' => 'post_date',
            'order' => 'DESC'
        ];

        $this->addPagerToContext($context, 'news', $viewModelBuilder, $queryOptions);

        if(count($context['post']->list) === 0) {
            $context['listingError'] = [
                'heading' => 'No news stories found',
                'message' => 'Try browsing all news, or searching the site for a specific story.'
            ];
        }

        return new TimberResponse('patterns/pages/news/news-listing/news-listing.twig', $context);
    }
}
