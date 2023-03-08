function getFullContext() {
    return {
        background: 'dark',
        contactInfo: '@footer-simple.contactInfo',
        footerMenu: '@footer-simple.footerMenu',
        breadcrumbs: '@breadcrumbs.breadcrumbs',
        eyebrowMenu: '@eyebrow.eyebrowMenu',
        mainMenu: '@main-navigation.mainMenu',
        post: {
            title: 'News',
            featuredStory: '@featured-news.post',
            list: [
                {
                    title: 'The University of Illinois Promoted to a Silver Bicycle Friendly University by the League of American Bicyclists',
                    permalink: 'http://localhost:3000/components/detail/news',
                    publishDate: 'November 19, 2019',
                    featuredImage: {
                        src: 'https://placekitten.com/320/228',
                        altText: 'friendly kitten',
                    }
                },
                {
                    title: 'The University of Illinois Promoted to a Silver Bicycle Friendly University by the League of American Bicyclists',
                    permalink: 'http://localhost:3000/components/detail/news',
                    publishDate: 'November 19, 2019',
                    featuredImage: {
                        src: 'https://placekitten.com/320/228',
                        altText: 'friendly kitten',
                    }
                },
                {
                    title: 'The University of Illinois Promoted to a Silver Bicycle Friendly University by the League of American Bicyclists',
                    permalink: 'http://localhost:3000/components/detail/news',
                    publishDate: 'November 19, 2019',
                    featuredImage: {
                        src: 'https://placekitten.com/320/228',
                        altText: 'friendly kitten',
                    }
                },
                {
                    title: 'The University of Illinois Promoted to a Silver Bicycle Friendly University by the League of American Bicyclists',
                    permalink: 'http://localhost:3000/components/detail/news',
                    publishDate: 'November 19, 2019',
                    featuredImage: {
                        src: 'https://placekitten.com/320/228',
                        altText: 'friendly kitten',
                    }
                },
                {
                    title: 'The University of Illinois Promoted to a Silver Bicycle Friendly University by the League of American Bicyclists',
                    permalink: 'http://localhost:3000/components/detail/news',
                    publishDate: 'November 19, 2019',
                    featuredImage: {
                        src: 'https://placekitten.com/320/228',
                        altText: 'friendly kitten',
                    }
                },
                {
                    title: 'The University of Illinois Promoted to a Silver Bicycle Friendly University by the League of American Bicyclists',
                    permalink: 'http://localhost:3000/components/detail/news',
                    publishDate: 'November 19, 2019',
                    featuredImage: {
                        src: 'https://placekitten.com/320/228',
                        altText: 'friendly kitten',
                    }
                },
            ]
        },
        pagination: '@pager.pagination'
    };
}

function getNoFeaturedStoryContext() {
    const context = getFullContext();
    context.post.featuredStory = null;
    return context;
}

function getNoImageForFeaturedStoryContext() {
    const context = getFullContext();
    context.post.featuredStory = {
        title: "The University of Illinois Promoted to a Silver Bicycle Friendly University by the League of American Bicyclists",
        date: "January 17, 2020",
        summary: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
    };
    return context;
}

module.exports = {
    title: 'News Listing',
    context: getFullContext(),
    variants: [
        {
            name: 'No Featured Story',
            context: getNoFeaturedStoryContext()
        },
        {
            name: 'No Image For Featured Story',
            context: getNoImageForFeaturedStoryContext()
        },
        {
            name: 'No posts found',
            context: {
                post: {
                    list: []
                },
                listingError: {
                    heading: 'No news stories found',
                    message: 'Try browsing all news, or searching the site for a specific story.'
                },
                pagination: null
            }
        }
    ]
};
