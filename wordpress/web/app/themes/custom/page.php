<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

namespace App;

use App\Http\Controllers\Controller;
use App\ViewModels\PageViewModel;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Timber\Timber;

class PageController extends Controller
{
    public function handle()
    {
        $context = $this->getContext();
        $post = new Post();
        $context['post'] = PageViewModel::createFromPost($post);

        return new TimberResponse('patterns/pages/basic-page/basic-page.twig', $context);
    }
}
