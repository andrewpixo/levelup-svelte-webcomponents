'use strict';

/* Create a new Fractal instance and export it for use elsewhere if required */
const fractalConfig = module.exports = require('@frctl/fractal').create();

const twigAdapter = require('@frctl/twig')({
    base: '/',
    functions: {
        getDimensions: (width, height) => { return [{width, height}];},
        getNewHeightBasedOnAspectRatio: (origWidth, origHeight, newWidth) => { return newWidth * origHeight / origWidth;},
    },
    filters: {
        resize: (a) => a,
        towebp: (a) => a,
        tojpg: (a) => a,
    },
});

fractalConfig.components.engine(twigAdapter);
fractalConfig.components.set('ext', '.twig');

/* Set the title of the project */
fractalConfig.set('project.title', 'Custom theme (replace with client name)');

fractalConfig.components.set('label', 'Patterns');

/* Tell Fractal where the components will live */
fractalConfig.components.set('path', __dirname + '/patterns');

/* Tell Fractal where the documentation pages will live */
fractalConfig.docs.set('path', __dirname + '/docs');

fractalConfig.web.set('static.path', __dirname + '/dist');

fractalConfig.web.set('builder.dest', __dirname + '/build');

const mandelbrot = require('@frctl/mandelbrot');
const CustomTheme = mandelbrot({
    skin: "white",
    panels: ["html", "view", "context", "resources", "info", "notes"],
    nav: ['search', 'docs', 'components']
});

fractalConfig.web.theme(CustomTheme);
