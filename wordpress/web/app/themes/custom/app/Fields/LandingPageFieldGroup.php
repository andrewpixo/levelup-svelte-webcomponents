<?php

use App\ACF\FieldsBuilder;

$builder = new FieldsBuilder('landing_page');
$builder->setSeamlessStyle();
$builder->setTitle('Content (Landing)');

$builder->setLocation('page_template', '==', 'page-templates/landing.php');

$builder->addAccordion('Introduction', [
    'open' => true,
]);

$builder->addIntroText();

$builder->addAccordion('Components');

$builder->addComponents('page');

$builder->addAccordion('landing_accordion_end')->endpoint();

return $builder;
