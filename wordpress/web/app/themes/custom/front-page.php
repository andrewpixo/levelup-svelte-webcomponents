<?php

namespace App;

use App\Http\Controllers\Controller;
use App\ViewModels\HomePageViewModel;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;

class FrontPageController extends Controller
{
    public function handle(): TimberResponse
    {
        $context = $this->getContext();
        $post = new Post;

        $context['post'] = HomePageViewModel::createFromPost($post);

        return new TimberResponse('patterns/pages/home/home.twig', $context);
    }
}
