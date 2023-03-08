<?php

use App\ACF\FieldsBuilder;

$builder = new FieldsBuilder('page');

$builder->setLocation('page_template', '==', 'default');
$builder->setSeamlessStyle();

$builder->addAccordion('Introduction', [
    'open' => true,
]);

$builder->addIntroText();

$featureImageBuilder = $builder->addCaptionedConditionalImage('image');

$builder->addAccordion('Components');

$builder->addComponents('page');

$builder->addAccordion('accordion_end')->endpoint();

return $builder;
