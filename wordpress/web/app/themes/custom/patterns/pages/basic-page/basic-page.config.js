'use strict';

module.exports = {
    title: 'Basic Page',
    context: {
        mainMenu: '@main-navigation.mainMenu',
        breadcrumbs: '@breadcrumbs.breadcrumbs',
        post: {
            title: 'Interior Page',
            introText: '<p>Lorem ipsum dolor sit, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>',
            featuredImage: {
                src: 'https://placeimg.com/880/560/nature',
                altText: 'nature, in its natural habitat',
                caption: 'nature, in its natural habitat',
            },
            components: [
                '@image.component',
                '@text.component',
                '@link-list.component',
                '@link-cards.component',
            ]
        }
    },
    variants: [
        {
            name: 'no featured image',
            context: {
                post: {
                    featuredImage: null,
                }
            }
        },
    ]
};
