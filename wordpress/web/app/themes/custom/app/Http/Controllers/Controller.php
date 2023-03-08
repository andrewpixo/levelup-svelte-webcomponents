<?php

namespace App\Http\Controllers;

use App\ViewModels\ContactViewModel;
use App\Utilities\Fields;
use App\ViewModels\MenuViewModel;
use Rareloop\Lumberjack\Http\Controller as BaseController;
use Timber\Post;
use Timber\PostQuery;
use Timber\Timber;

class Controller extends BaseController
{
    protected function getContext()
    {
        $context = Timber::get_context();
        $context['siteLogo'] = Fields::getField('site_logo')['url'];
        $context['is_wordpress'] = true;
        $context['mainMenu'] = $this->createMenu('Main Navigation');
        $context['eyebrowMenu'] = $this->createMenu('Eyebrow Navigation');
        $context['breadcrumbs'] = $this->createBreadcrumbs(new Post());
        $context['contactInfo'] = $this->createContactInfo();
        $context['footerLinks'] = $this->createMenu('Footer Links');
        $context['googleAnalyticsTrackingId'] = $this->createGoogleAnalyticsTrackingId();

        return $context;
    }

    protected function createContactInfo()
    {
        return ContactViewModel::createFromPost();
    }

    protected function createGoogleAnalyticsTrackingId()
    {
        if (get_field('field_site_settings_google_analytics_tracking_code', 'option')) {
            return get_field('field_site_settings_google_analytics_tracking_code', 'option');
        } else {
            return null;
        }
    }

    protected function createBreadcrumbs(Post $post)
    {
        return collect(array_merge([$post->id], get_post_ancestors($post->id)))
            ->map(
                function ($ancestorId) {
                    return new Post($ancestorId);
                }
            )
            ->map(
                function ($ancestor) {
                    return [
                        'title' => $ancestor->title,
                        'url' => $ancestor->link
                    ];
                }
            )
            ->push(
                [
                    'title' => 'Home',
                    'url' => '/'
                ]
            )
            ->reverse();
    }

    protected function createMenu($menuName)
    {
        $menu = new \Timber\Menu($menuName);
        return MenuViewModel::createFromPost($menu);
    }

    protected function addPagerToContext(
        &$context,
        $postType,
        $viewModelCreator,
        $queryOptions = [],
        $postsPerPage = 10
    ) {
        global $paged;
        if (!isset($paged) || !$paged) {
            $paged = 1;
        }

        $baseQueryOptions = [
            'post_type' => $postType,
            'posts_per_page' => $postsPerPage,
            'paged' => $paged
        ];

        $query = new PostQuery(array_merge($baseQueryOptions, $queryOptions));
        $context['totalFoundPosts'] = $query->found_posts;

        // Timber's pagination accepts the same arguments as WP's paginate_links()
        // See https://developer.wordpress.org/reference/functions/paginate_links/
        $context['pagination'] = $query->pagination(
            [
                'mid_size' => 1,
                'end_size' => 1
            ]
        );
        $context['post']->list = collect($query->get_posts())
            ->map($viewModelCreator)
            ->toArray();
    }
}

