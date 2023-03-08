module.exports = {
    context: {
        component: {
            type: 'text',
            header: 'A header passed in as a string',
            richText:
                "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. " +
                "Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. " +
                "Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. " +
                "Nam fermentum, <a href='#'>nulla luctus pharetra vulputate</a>, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan.</p>" +
                "<h4>Ph.D students</h4> <ul><li>Max Eisenburger: Economic Development and the Solar Industry. Ph.D. " +
                "Expected 2019 </li><li>Steve Sherman: Policing, Planmaking and Anchor Institutions. Ph.D. Expected 2019 </li>" +
                "<li>Ozge Yenigun: Migration, Diversity and Economic Development. Ph.D. Expected 2021. </li></ul> " +
                "<h4>MUP students</h4> <ul><li>Adrienne Cooke: Fair Workweek Policies (Spring 2019) </li>" +
                "<li>Tejashree Kulkarni: Workforce Development (Spring 2019) </li>" +
                "<li>Jacob Malmsten: East-Central Illinois Labor Market Profile (Spring 2019)</li></ul> ",
        },
    },
    variants: [
        {
            name: 'with half width image on right',
            context: {
                component: {
                    image: {
                        src: 'https://picsum.photos/800/650',
                        altText: 'placeholder',
                        caption: 'Caption of image',
                    },
                    width: 'half',
                    placement: 'right'
                }
            }
        },
        {
            name: 'with half width image on left',
            context: {
                component: {
                    image: {
                        src: 'https://picsum.photos/1280/650',
                        altText: 'placeholder',
                        caption: 'Caption of image',
                    },
                    width: 'half',
                    placement: 'left'
                }
            }
        },
        {
            name: 'with third width image on right',
            context: {
                component: {
                    image: {
                        src: 'https://picsum.photos/1280/850',
                        altText: 'placeholder',
                        caption: 'Caption of image',
                    },
                    width: 'third',
                    placement: 'right'
                }
            }
        },
        {
            name: 'with third width image on left',
            context: {
                component: {
                    image: {
                        src: 'https://picsum.photos/1280/850',
                        altText: 'placeholder',
                        caption: 'Caption of image',
                    },
                    width: 'third',
                    placement: 'left'
                }
            }
        },
    ]
};
