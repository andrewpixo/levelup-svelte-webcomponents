<?php

use App\ACF\FieldsBuilder;

$builder = new FieldsBuilder('homepage_settings');

$builder
    ->setLocation('options_page', '==', 'homepage-settings');

$builder
    ->addText('title')
    ->setInstructions('The title of the home page.')
    ->setRequired();

$builder
    ->addInlineRichText('home_intro')
    ->setInstructions('A quick intro into the site.')
    ->setRequired();

$builder
    ->addCallToActionButton('home_call_to_action_one', $builder);

$builder
    ->addCallToActionButton('home_call_to_action_two', $builder);

$builder
    ->addAccordion('Components')
    ->addComponents('page');

return $builder;
