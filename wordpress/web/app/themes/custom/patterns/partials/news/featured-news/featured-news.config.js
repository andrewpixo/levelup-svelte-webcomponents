module.exports = {
    title: 'Featured Story',
    context: {
        post: {
            title: 'The University of Illinois Promoted to a Silver Bicycle Friendly University by the League of American Bicyclists',
            date: 'January 17, 2020',
            featuredImage: {
                src: 'https://placekitten.com/880/496',
                altText: 'friendly kitten',
            },
            summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        },
        background: 'light'
    },
    variants: [
        {
            name: 'On dark',
            preview: '@preview-on-charcoal-lighter',
            context: {
                background: 'dark'
            }
        }
    ]
}
