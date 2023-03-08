<?php

use App\ACF\ACFBuilderUtilities;
use App\ACF\WysiwygEditors;
use App\ACF\OptionPages;
use App\Http\Lumberjack;
use App\Utilities\ManageMimeTypes;

require_once __DIR__ . '/vendor/autoload.php';

// Create the Application Container
$app = require_once('bootstrap/app.php');

// Bootstrap Lumberjack from the Container
$lumberjack = $app->make(Lumberjack::class);
$lumberjack->bootstrap();

// Import our routes file
require_once('routes.php');

// Enqueue scripts and styles
require_once('app/Utilities/EnqueueAssets.php');

// Initialize image dimensions
require_once('app/Utilities/InitializeImageDimensions.php');

// Set global params in the Timber context
add_filter('timber_context', [$lumberjack, 'addToContext']);

OptionPages::initialize();

ACFBuilderUtilities::initialize();

WysiwygEditors::initialize();

ManageMimeTypes::addMimeType('svg', 'image/svg+xml');

/* Disable XMLrpc.php for added security */
add_filter( 'xmlrpc_enabled', '__return_false' );

global $wp_rewrite;
$wp_rewrite->set_permalink_structure('/%postname%/');
update_option("rewrite_rules", false);

# Add registerComponentViewModels
/* registerComponentViewModels(); */
/* function registerComponentViewModels() */
/* { */
/*     $files = collect(glob(get_template_directory() . '/app/ViewModels/Components/*.php'))->toArray(); */
/*     foreach ($files as $file) { */
/*         // get_declared_classes() will only show classes that have been required/loaded. */
/*         require_once($file); */
/*     } */
/* } */

add_action(
    'init',
    function () {
        // Check if the menu exists
        $menu_name = 'Main Navigation';
        $menu_exists = wp_get_nav_menu_object($menu_name);

        // If it doesn't exist, let's create it.
        if (!$menu_exists) {
            $menu_id = wp_create_nav_menu($menu_name);
        }
    }
);

add_action(
    'init',
    function () {
        // Check if the menu exists
        $menu_name = 'Footer Links';
        $menu_exists = wp_get_nav_menu_object($menu_name);

        // If it doesn't exist, let's create it.
        if (!$menu_exists) {
            $menu_id = wp_create_nav_menu($menu_name);
        }
    }
);

add_action(
    'init',
    function () {
        // Check if the menu exists
        $menu_name = 'Eyebrow Menu';
        $menu_exists = wp_get_nav_menu_object($menu_name);

        // If it doesn't exist, let's create it.
        if (!$menu_exists) {
            $menu_id = wp_create_nav_menu($menu_name);
        }
    }
);

