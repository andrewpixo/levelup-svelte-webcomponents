<?php

/**
* Template Name: Landing Page
*/

namespace App;

use App\Http\Controllers\Controller;
use App\ViewModels\LandingPageViewModel;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;

class LandingController extends Controller
{
    public function handle()
    {
        $context = $this->getContext();
        $post = new Post;

        $context['post'] = LandingPageViewModel::createFromPost($post);

        return new TimberResponse('pages/landing/landing.twig', $context);
    }
}
