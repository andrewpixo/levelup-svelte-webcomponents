<?php

use Rareloop\Lumberjack\Facades\Router;
use Zend\Diactoros\Response\HtmlResponse;

Router::get('/pixo-blog/v1', 'BlogController@hook_rest_server');
