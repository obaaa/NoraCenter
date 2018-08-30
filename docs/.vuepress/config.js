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
                title: 'documentation',
                collapsable: true,
                children: [
                '/content/'
                ]
            },
            {
                title: 'Setting',
                collapsable: true,
                children: [
                '/setting/',
                '/setting/app.md',
                '/setting/branche.md',
                '/setting/classroom.md',
                '/setting/classroom_lectures.md',
                '/setting/specialties.md',
                '/setting/courses.md',
                '/setting/manager.md'
                ]
            },
            {
                title: 'Employees',
                collapsable: true,
                children: [
                '/employees/',
                '/employees/receptionist.md',
                '/employees/accountant.md',
                '/employees/trainer.md',
                // '/employees/classroom_lectures.md',
                // '/employees/specialties.md',
                // '/employees/courses.md',
                // '/employees/manager.md'
                ]
            }
            ]
    }
}
