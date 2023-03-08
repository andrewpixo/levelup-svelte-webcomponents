module.exports = {
    context: {
        component: {
            type: 'image',
            image: {
                src: 'https://picsum.photos/800/650',
                altText: 'placeholder',
            },
        }
    },
    variants: [
        {
            name: 'Image with caption',
            context: {
                component: {
                    image: {
                        src: 'https://picsum.photos/800/650',
                        altText: 'placeholder',
                        caption: 'Caption of image',
                    },
                }
            },
        }
    ]
};
