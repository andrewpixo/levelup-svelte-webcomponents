<?php

use App\ViewModels\MenuItemViewModel;
use WP_Mock\Tools\TestCase;

class MenuItemTest extends TestCase
{
    public function setUp() : void
    {
        \WP_Mock::setUp();
    }

    public function tearDown() : void
    {
        \WP_Mock::tearDown();
    }

    public function testViewModelTitle()
    {
        $post = $this->getTestPost();
        $viewModel = MenuItemViewModel::createFromPost($post);
        $this->assertEquals('Test title', $viewModel->title);
    }

    public function getTestPost()
    {
        $post = (object) [
            'title' => 'Test title',
            'url' => 'https://www.google.com',
            'current' => 'Current item',
            'current_item_parent' => 'Current item parent',
            'current_item_ancestor' => 'Current item ancestor'
        ];

        return $post;
    }
}
