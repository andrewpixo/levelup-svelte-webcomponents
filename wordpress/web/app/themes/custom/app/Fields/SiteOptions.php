<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('site_settings');

$builder
    ->setLocation('options_page', '==', 'site-general-settings');

$builder
    ->addImage('site_logo');
$builder
    ->addText('contact_phone');
$builder
    ->addText('contact_email');
$builder
    ->addTextArea('contact_address');
$builder
    ->addText('contact_copyright');
$builder
    ->addUrl('facebook_link');
$builder
    ->addUrl('flickr_link');
$builder
    ->addUrl('linkedin_link');
$builder
    ->addUrl('twitter_link');
$builder
    ->addUrl('instagram_link');
$builder
    ->addUrl('youtube_link');
$builder
    ->addText('google_analytics_tracking_code');

return $builder;
