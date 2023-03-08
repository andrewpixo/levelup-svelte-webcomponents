<?php

namespace App\ACF;

use App\Fields\Components\Image;
use App\Fields\Components\LinkList;
use App\Fields\Components\LinkCards;
use App\Fields\Components\Text;
use App\Fields\Layouts\ExternalLink;
use App\Fields\Layouts\PageLink;
use App\Fields\Layouts\FileLink;

class FieldsBuilder extends \StoutLogic\AcfBuilder\FieldsBuilder
{
    public function __construct($name, array $groupConfig = [])
    {
        $groupConfig['hide_on_screen'] = [
            'the_content',
            'discussion',
            'author',
            'comments',
            'slug',
            'featured_image'
        ];

        parent::__construct($name, $groupConfig);
    }

    public function setTitle($title)
    {
        $this->setGroupConfig('title', $title);
        return $this;
    }

    public function setSeamlessStyle()
    {
        $this->setGroupConfig('style', 'seamless');
        return $this;
    }

    public function addField($name, $type, array $args = [])
    {
        return $this->initializeField(new FieldBuilder($name, $type, $args));
    }

    public function addGravityForm($name, array $args = [])
    {
        return $this->addField($name, 'forms', $args);
    }

    public function addTable($name, array $args = [])
    {
        return $this->addField($name, 'table', $args);
    }

    function addDateTimePicker($name, array $args = [])
    {
        $args['display_format'] = 'm/d/Y g:i a';
        $args['return_format'] = 'Y-m-d H:i:s';

        return parent::addDateTimePicker($name, $args);
    }

    function addImageWithAltText($name)
    {
        $imageBuilder = $this->addImage($name)
            ->setRequired()
            ->setWidth('50%');

        $altTextBuilder = $this->addText("{$name}_alt_text")
            ->setLabel('Alt Text')
            ->setInstructions('A short (twelve words or fewer) sentence helpfully describing the image. ' .
                'Alt text is important for accessibility and SEO. Pretend you\'re describing the image to ' .
                'someone who can\'t see it.')
            ->setRequired()
            ->setWidth('50%');

        return [
            'image' => $imageBuilder,
            'altText' => $altTextBuilder,
        ];
    }

    function addCaptionedImage($name)
    {
        $imageBuilders = $this->addImageWithAltText($name);

        $captionBuilder = $this
            ->addText("{$name}_caption")
            ->setInstructions('A caption for the image, if desired.');

        return [
            'image' => $imageBuilders['image'],
            'altText' => $imageBuilders['altText'],
            'caption' => $captionBuilder
        ];
    }

    function addConditionalImage($name)
    {
        $sliderBuilder = $this
            ->addTrueFalse('add_image', [
                'ui' => 1,
            ])
            ->setLabel('Add an image');

        $imageBuilders = $this->addImageWithAltText($name);

        $imageBuilder = $imageBuilders['image'];
        $imageBuilder->conditional('add_image', '==', '1');

        /** @var FieldBuilder $altTextBuilder**/
        $altTextBuilder = $imageBuilders['altText'];
        $altTextBuilder->conditional('add_image', '==', '1');

        return [
            'slider' => $sliderBuilder,
            'image' => $imageBuilder,
            'altText' => $altTextBuilder
        ];
    }

    function addCaptionedConditionalImage($name)
    {
        $imageBuilders = $this->addConditionalImage($name);

        $captionBuilder = $this->addText("{$name}_caption")
            ->conditional('add_image', '==', '1')
            ->setInstructions('A caption for the image, if desired.');

        return [
            'image' => $imageBuilders['image'],
            'caption' => $captionBuilder,
            'slider' => $imageBuilders['slider'],
            'altText' => $imageBuilders['altText']
        ];
    }

    function addInlineRichText($name)
    {
        return $this->addRichText($name, 'inline');
    }

    function addBlockRichText($name)
    {
        return $this->addRichText($name, 'block');
    }

    function addRichText($name, $toolbarStyle)
    {
        return $this->addWysiwyg($name, [
            'toolbar' => $toolbarStyle,
            'media_upload' => false,
            'tabs' => 'visual'
        ]);
    }

    function addLinkedText($name, $builder)
    {
        $builder->addText("{$name}_text", [
            'label' => 'Text'
        ])
            ->setWidth('33.333%');

        $this->addInternalOrExternalLink($name, $builder);

        return $builder;
    }

    function addLinkedTextWithIcon($name, $builder)
    {
        $builder->addText("{$name}_text", [
            'label' => 'Text'
        ])
            ->setWidth('33.333%');

        $this->addInternalOrExternalLink($name, $builder);

        $builder->addSelect("{$name}_icon")
            ->addChoice('right-chevron', 'chevron')
            ->addChoice('edit')
            ->addChoice('calendar')
            ->addChoice('chat')
            ->addChoice('location-marker', 'location marker')
            ->addChoice('url-link', 'url link')
            ->addChoice('question-mark', 'question mark')
            ->addChoice('person')
            ->conditional("{$name}_type", '==', 'internal');

        return $builder;
    }

    function addInternalOrExternalLink($name, $builder)
    {
        $linkTypeButtonBuilder = $builder->addButtonGroup("{$name}_type", [
            'label' => 'Link Type'
        ])
            ->addChoices([
                'internal' => 'Internal',
                'external' => 'External'
            ])
            ->setWidth('33.333%');

        $externalUrlBuilder = $builder->addURL("{$name}_external_url", [
            'label' => 'External URL'
        ])
            ->conditional("{$name}_type", '==', 'external')
            ->setRequired()
            ->setWidth('33.333%');

        $internalUrlBuilder = $builder->addPageLink("{$name}_internal_url", [
            'label' => 'Internal Page'
        ])
            ->conditional("{$name}_type", '==', 'internal')
            ->setInstructions('Start typing a page title you\'d like to link to.')
            ->setRequired()
            ->setWidth('33.333%');

        return [
            'linkTypeButton' => $linkTypeButtonBuilder,
            'externalUrl' => $externalUrlBuilder,
            'internalUrl' => $internalUrlBuilder,
        ];
    }

    function addIntroText()
    {
        $this->addInlineRichText('intro_text')
            ->setLabel('Introductory text')
            ->setInstructions('A brief paragraph (about 20-25 words) that summarizes the topic of this page. Think of describing the topic to someone who is learning about the department for the first time.');

        return $this;
    }

    function addVideo($name)
    {
        $videoBuilder = $this->addOembed($name)
            ->setLabel('Video')
            ->setInstructions('URL of the video you\'d like to embed (from a service like YouTube or Vimeo).');

        $captionBuilder = $this->addText("{$name}_caption")
            ->setLabel('Caption')
            ->setInstructions('Brief (about 10-20 words), but compelling description of the video. ');

        return [
            'video' => $videoBuilder,
            'caption' => $captionBuilder
        ];
    }

    function addCallToActionButton($namePrefix, $builder)
    {
        $textBuilder = $this->addText($namePrefix . '_text')
            ->setRequired()
            ->setInstructions('A very short (1-3 words) verb-driven phrase.');

        $linkBuilder = $this->addInternalOrExternalLink($namePrefix, $builder);

        return [
            'text' => $textBuilder,
            'link' => $linkBuilder
        ];
    }

    function addConditionalCallToActionButton($namePrefix, $builder)
    {
        $sliderBuilder = $this->addTrueFalse('add_cta', [
            'ui' => 1,
        ])
            ->setLabel('Add a call to action');

        $ctaBuilders = $this->addCallToActionButton($namePrefix, $builder);

        /** @var FieldBuilder $textBuilder */
        $textBuilder = $ctaBuilders['text'];
        $textBuilder->conditional('add_cta', '==', 1);

        $linkBuilder = $ctaBuilders['link'];

        /** @var FieldBuilder $linkTypeButtonBuilder */
        $linkTypeButtonBuilder = $linkBuilder['linkTypeButton'];
        $linkTypeButtonBuilder->conditional('add_cta', '==', 1);

        /** @var FieldBuilder $externalUrlBuilder */
        $externalUrlBuilder = $linkBuilder['externalUrl'];
        $externalUrlBuilder->conditional("{$namePrefix}_type", '==', 'external')
            ->and('add_cta', '==', 1);

        /** @var FieldBuilder $internalUrlBuilder */
        $internalUrlBuilder = $linkBuilder['internalUrl'];
        $internalUrlBuilder->conditional("{$namePrefix}_type", '==', 'internal')
            ->and('add_cta', '==', 1);

        return [
            'slider' => $sliderBuilder,
            'text' => $textBuilder,
            'link' => $linkBuilder
        ];
    }

    function addComponents($parentFieldGroupName, $fieldGroupName = 'components', $options = []) {
        $flexibleContentBuilder = $this
            ->addFlexibleContent($fieldGroupName, $options)
            ->setLabel('');

        $flexibleContentBuilder->addLayout(Image::getFieldBuilder("{$parentFieldGroupName}_{$fieldGroupName}"));
        $flexibleContentBuilder->addLayout(Text::getFieldBuilder("{$parentFieldGroupName}_{$fieldGroupName}"));
        $flexibleContentBuilder->addLayout(LinkList::getFieldBuilder("{$parentFieldGroupName}_{$fieldGroupName}"));
        $flexibleContentBuilder->addLayout(LinkCards::getFieldBuilder("{$parentFieldGroupName}_{$fieldGroupName}"));

        return $flexibleContentBuilder;
    }

    function addLinkTypes($fieldName, $params = []) {
        $flexibleContentBuilder = $this
            ->addFlexibleContent($fieldName, $options = ['button_label' => 'Add Link'])
            ->setRequired()
            ->setLabel('Links')
            ->modifyField($fieldName, $params);

        $flexibleContentBuilder->addLayout(ExternalLink::getFieldBuilder($fieldName));
        $flexibleContentBuilder->addLayout(PageLink::getFieldBuilder($fieldName));
        $flexibleContentBuilder->addLayout(FileLink::getFieldBuilder($fieldName));

        return $flexibleContentBuilder;
    }

    function addBasicComponents($parentFieldGroupName, $fieldGroupName = 'components', $options = []) {
        $flexibleContentBuilder = $this
            ->addFlexibleContent($fieldGroupName, $options)
            ->setLabel('');

        $flexibleContentBuilder->addLayout(Image::getFieldBuilder("{$parentFieldGroupName}_{$fieldGroupName}"));
        $flexibleContentBuilder->addLayout(Text::getFieldBuilder("{$parentFieldGroupName}_{$fieldGroupName}"));

        return $flexibleContentBuilder;
    }
}
