module.exports = {
    title: 'Main Navigation Menu',
    context: {
        mainMenu: {
            currentPageInMenu: true,
            items: [
                {
                    title: 'Primary Page One',
                    url: 'https://google.com',
                    isActive: true,
                    isChildActive: false,
                    isDescendantActive: true,
                    children: [],
                },
                {
                    title: 'Primary Page Two',
                    url: 'http://google.com',
                    isActive: false,
                    isChildActive: false,
                    isDescendantActive: false,
                    children: []
                },
                {
                    title: 'Primary Page Three',
                    url: 'http://google.com',
                    isActive: false,
                    isChildActive: false,
                    isDescendantActive: false,
                    children: [
                        {
                            title: 'Interior Page 1',
                            url: 'http://google.com',
                            isActive: false,
                            isChildActive: false,
                            isDescendantActive: false,
                            children: []
                        },
                        {
                            title: 'Interior Page 2',
                            url: 'http://google.com',
                            isActive: false,
                            isChildActive: false,
                            isDescendantActive: false,
                            children: []
                        },
                        {
                            title: 'Interior Page 3',
                            url: 'http://google.com',
                            isActive: false,
                            isChildActive: false,
                            isDescendantActive: false,
                            children: []
                        },
                        {
                            title: 'Interior Page 4',
                            url: 'http://google.com',
                            isActive: false,
                            isChildActive: false,
                            isDescendantActive: true,
                            children: [],
                        },
                        {
                            title: 'Interior Page 5',
                            url: 'http://google.com',
                            isActive: false,
                            isChildActive: false,
                            isDescendantActive: false,
                            children: []
                        },
                        {
                            title: 'Interior Page 6',
                            url: 'http://google.com',
                            isActive: false,
                            isChildActive: false,
                            isDescendantActive: false,
                            children: []
                        },
                        {
                            title: 'Interior Page 7',
                            url: 'http://google.com',
                            isActive: false,
                            isChildActive: false,
                            isDescendantActive: false,
                            children: []
                        }
                    ]
                },
                {
                    title: 'Primary Page Four',
                    url: 'http://google.com',
                    isActive: false,
                    isChildActive: false,
                    isDescendantActive: false,
                    children: []
                },
                {
                    title: 'Primary Page Five',
                    url: 'http://google.com',
                    isActive: false,
                    isChildActive: false,
                    isDescendantActive: false,
                    children: []
                },
                {
                    title: 'Primary Page Six',
                    url: 'http://google.com',
                    isActive: false,
                    isChildActive: false,
                    isDescendantActive: false,
                    children: []
                },
            ]
        }
    },
};
