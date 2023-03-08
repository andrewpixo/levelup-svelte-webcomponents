const pageCount = 15;
const pagerPages = [{
    title: 1,
    current: true
}
];
for (let i = 2; i < pageCount; i++) {
    pagerPages.push({
        title: i,
        link: '#'
    });
}
module.exports = {
    title: 'Pager',
    display:    {
        'max-width': '880px'
    },
    context: {
        pagination:{
            pages: [
                {
                    title: 1,
                    link: '#',
                    current: true
                },
                {
                    title: 2,
                    link: '#'
                },
                {
                    title: 3,
                    link: '#'
                },
                {
                    title: 4,
                    link: '#',
                },
            ],
            next: {
                link: '#'
            }
        },
    },
    variants: [
        {
            name: 'Pager end',
            context: {
                pagination: {
                    pages: [
                        {
                            title: 1,
                            link: '#'
                        },
                        {
                            title: 2,
                            link: '#'
                        },
                        {
                            title: 3,
                            link: '#'
                        },
                        {
                            title: 4,
                            link: '#',
                            current: true
                        },
                    ],
                    prev: {
                        link: '#'
                    },
                    next: {
                        link: ''
                    }
                }
            }
        },
        {
            name: 'Pager x15',
            context: {
                pagination: {
                    pages: pagerPages,
                    next: {
                        link: '#'
                    }
                }
            }
        },
    ]
};
