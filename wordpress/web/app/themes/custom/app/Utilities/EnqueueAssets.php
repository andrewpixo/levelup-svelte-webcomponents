<?php

add_action(
    'wp_enqueue_scripts',
    function () {
        registerStyles();
        registerScripts();
        loadTypekitFonts();
        loadGoogleFonts();
    }
);

function registerStyles()
{
    $styleFiles = collect(glob(get_template_directory() . '/dist/css/*.css'))->toArray();
    foreach (getStyleAssetData($styleFiles) as $styleData) {
        wp_enqueue_style(
            $styleData['handle'],
            $styleData['uri']
        );
    }
}

function registerScripts()
{
    // 2020-01-10 - We had to fix the CSS version of this because it was trying to register file paths rather than URLs
    // Will need the same fix here likely, but we don't have any js files yet to even test with...
    $javascriptFiles = collect(glob(get_template_directory() . '/dist/js/*.js'))->toArray();
    foreach (getScriptAssetData($javascriptFiles) as $javascriptFile) {
        wp_enqueue_script(
            $javascriptFile['handle'],
            $javascriptFile['uri'],
            null,
            '1.0',
            true
        );
    }
}

function getStyleAssetData($fileUris)
{
    return getAssetDataFromFileUris($fileUris, '/dist/css/');
}

function getScriptAssetData($fileUris)
{
    return getAssetDataFromFileUris($fileUris, '/dist/js/');
}

function getAssetDataFromFileUris($fileUris, $directory)
{
    return array_map(
        function ($fileUri) use ($directory) {
            $fileName = array_values(array_slice(explode('/', $fileUri), -1))[0];
            $handle = explode('.', $fileName)[0];

            return [
                'uri' => get_stylesheet_directory_uri() . $directory . $fileName,
                'handle' => $handle
            ];
        },
        $fileUris
    );
}

function loadTypekitFonts()
{
    wp_enqueue_script('typekit', 'https://use.typekit.net/kuc5lwk.js', array(), '1.0');
    wp_add_inline_script('typekit', 'try{Typekit.load({ async: true });}catch(e){}');
}

add_action('wp_enqueue_scripts', 'loadTypekitFonts');

function loadGoogleFonts()
{
    wp_enqueue_style('googleFontsSourceSans', 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap');
    wp_enqueue_style('googleFontsRaleway', 'https://fonts.googleapis.com/css2?family=Raleway:wght@600;800&display=swap');
}
