const Encore = require("@symfony/webpack-encore");
const rupture = require("rupture");
const FractalWebpackPlugin = require("fractal-webpack-plugin");

if (!Encore.isRuntimeEnvironmentConfigured())
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || "dev");

Encore.setOutputPath("dist/")
    .setPublicPath("/app/themes/custom/dist")
    .setManifestKeyPrefix("dist/")
    .cleanupOutputBeforeBuild()
    .disableSingleRuntimeChunk()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableBuildNotifications(true, (options) => {
        options.alwaysNotify = true;
    })
    .copyFiles({
        from: "./assets/images",
        to: "images/[path][name].[ext]",
    })
    .enableStylusLoader(function (options) {
        options.stylusOptions = {
            includeCSS: true,
            resolveURL: false,
            use: [rupture()],
        };
    })
    .enablePostCssLoader(function (options) {
        options.postcssOptions = {
            plugins: {
                autoprefixer: {
                    grid: "autoplace",
                },
                "rucksack-css": {},
            },
        };
    })

    .configureCssLoader(function (options) {
        options.url = false;
    })

    .addEntry("js/main", "./js/main.js")
    .addStyleEntry("css/main", "./stylus/main.styl");

module.exports = Encore.getWebpackConfig();
