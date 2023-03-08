module.exports = {
    title: 'Breadcrumbs',
    status: 'ready',
    context: {
        breadcrumbs: [
            {
                title: 'Home',
                url: '#'
            },
            {
                title: 'Primary Page One',
                url: '#'
            },
            {
                title: 'Interior Page One',
                url: '#'
            },
        ],
    },
    variants: [
        {
            name: 'on dark',
            preview: '@preview-on-charcoal-lighter',
            context: {
                background: 'dark'
            },
        }
    ]
};
