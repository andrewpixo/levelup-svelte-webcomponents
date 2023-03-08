const {page} = require("../../../../../../wp/wp-includes/js/codemirror/csslint");
module.exports = {
    preview: '@preview-on-smoke',
    context: {
        component: {
            type: 'link-cards',
            header: 'Link Cards',
            description: '<p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>',
            linkCards: [
                {
                    text: 'Lorem ipsum dolor amet',
                    description: 'Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.',
                    link: {
                        text: 'Internal resource link',
                        type: 'page',
                        url: '#',
                    },
                    image: {
                        url: 'https://picsum.photos/id/10/432/272'
                    },
                    altText: 'Trees and lake',
                    imageToggle: true
                },
                {
                    text: 'Lorem ipsum dolor amet',
                    description: 'Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.',
                    link: {
                        text: 'Internal resource link',
                        type: 'page',
                        url: '#',
                    },
                    image: {
                        url: 'https://picsum.photos/id/10/432/272'
                    },
                    altText: 'Trees and lake',
                    imageToggle: true
                },
                {
                    text: 'Lorem ipsum dolor amet',
                    description: 'Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.',
                    link: {
                        text: 'Internal resource link',
                        type: 'page',
                        url: '#',
                    },
                    image: {
                        url: 'https://picsum.photos/id/10/432/272'
                    },
                    altText: 'Trees and lake',
                    imageToggle: true
                },
                {
                    text: 'Lorem ipsum dolor amet',
                    description: 'Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.',
                    link: {
                        text: 'Internal resource link',
                        type: 'page',
                        url: '#',
                    },
                    image: {
                        url: 'https://picsum.photos/id/10/432/272'
                    },
                    altText: 'Trees and lake',
                    imageToggle: true
                }
            ]
        }
    },
    variants: [
        {
            name: 'Example',
            context: {
                component: {}
            },
        }
    ]
};
