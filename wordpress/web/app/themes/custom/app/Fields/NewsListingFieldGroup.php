<?php

use App\ACF\FieldsBuilder;

$builder = new FieldsBuilder('news_listing');

$builder
    ->setLocation('page_template', '==', 'page-templates/news.php');

$builder
    ->addPostObject('featured_story',[
        'label' => 'Featured news story',
        'allow_null' => true,
        'multiple' => false,
        'post_type' => ['news']
    ])
    ->setInstructions('Start typing the name of a published news story to feature at the top of the page. ');

return $builder;
