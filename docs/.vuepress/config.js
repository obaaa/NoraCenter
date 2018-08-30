module.exports = {
    title: 'Nora Center',
    description: "Education Management System",
    themeConfig:{
        nav: [
            { text: 'documentation', link: '/content/' },
            { text: 'Obaaa', link: 'http://obaaa.sd' },
        ],
        sidebar: [
            {
                title: 'Content',
                collapsable: false,
                children: [
                '/content/'
                ]
            }
            ]
    }
}
