<?php

use App\Http\Controllers\BlogController;
use WP_Mock\Tools\TestCase;

class BlogControllerTest extends TestCase
{
    public function testGetQuery()
    {

        $expectedQuery = [
            'post_type' => 'blogArticle'
        ];

        $actualQuery = BlogController::getQuery();

        $this->assertEquals($expectedQuery, $actualQuery);
    }
}
