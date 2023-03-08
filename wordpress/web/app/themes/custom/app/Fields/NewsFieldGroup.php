<?php

use App\ACF\FieldsBuilder;
use App\PostTypes\News;

$builder = new FieldsBuilder('news');

$builder->setLocation('post_type', '==', News::getPostType());


$fieldBuilders = $builder->addCaptionedImage('featured_image');
$fieldBuilders['image']->setLabel('Featured image');
$fieldBuilders['image']->setInstructions('This image will appear throughout the site, wherever the story is referenced.');
$fieldBuilders['caption']->setLabel('Image caption');
$fieldBuilders['caption']->setInstructions('A caption for the image, if desired.');

$builder->addBlockRichText('summary')
    ->setLabel('Summary')
    ->setInstructions('A summary (about 25 words) of the story.')
    ->setRequired();

$repeaterBuilder = $builder->addRepeater('related_links');
$repeaterBuilder->setInstructions('Add related links, like a faculty profile, or an original story source on another site.');

$repeaterBuilder
    ->addLinkedText('link', $repeaterBuilder);

$repeaterBuilder
    ->endRepeater();

$builder->addBasicComponents('news');

return $builder;
