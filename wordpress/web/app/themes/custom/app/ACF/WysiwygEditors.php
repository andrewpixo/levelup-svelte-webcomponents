<?php

namespace App\ACF;

class WysiwygEditors
{
    /**
     * @var []
     */
    private $toolbars;

    public static function initialize()
    {
        $self = new WysiwygEditors();
        add_filter('acf/fields/wysiwyg/toolbars', array($self, 'setToolbars' ));
        add_filter('tiny_mce_before_init', array($self, 'setToolbarBlockFormats'));
    }

    public function setToolbars($toolbars)
    {
        $this->toolbars = $toolbars;

        $this->removeDefaultToolbars();
        $this->setToolbarBlockFormats($this->toolbars);
        $this->addThemeStylesToToolbar();
        $this->addNewToolbars();
        return $this->getToolbars();
    }
    private function removeDefaultToolbars()
    {
        unset($this->toolbars['Basic']);
        unset($this->toolbars['Full']);
    }

    private function addThemeStylesToToolbar()
    {
        function custom_editor_styles()
        {
            add_editor_style();
        }

        add_action('init', 'custom_editor_styles');
    }

    public function setToolbarBlockFormats($settings)
    {
        $settings['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre';
        return $settings;
    }

    private function addNewToolbars()
    {
        $this->toolbars['Inline'] = array();
        $this->toolbars['Inline'][1] = array(
            'bold',
            'italic',
            'link'
        );

        $this->toolbars['Block'] = array();
        $this->toolbars['Block'][1] = array(
            'formatselect',
            'bold',
            'italic',
            'blockquote',
            'link',
            'bullist',
            'numlist',
            'alignleft',
            'aligncenter',
            'alignright',
            'undo',
            'redo',
            'fullscreen',
            'wp_adv'
        );
        $this->toolbars['Block'][2] = array(
            'strikethrough',
            'removeformat',
            'outdent',
            'indent',
            'undo',
            'redo'
        );
    }

    public function getToolbars()
    {
        return $this->toolbars;
    }
}
