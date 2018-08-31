module.exports = {
    title: 'Nora Center',
    description: "Education Management System",
    themeConfig:{
        nav: [
            { text: 'Home', link: '/' },
            { text: 'documentation', link: '/content/' },
            { text: 'About', link: '/about' },
            { text: 'Obaaa', link: 'http://obaaa.sd' },
        ],
        sidebar: [
          ['/content/', 'Content'],
          ['/register_login/', 'Register & login'],
            {
                title: 'Setting',
                children: [
                '/setting/application_setting.md',
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
                children: [
                '/employees/receptionist.md',
                '/employees/accountant.md',
                '/employees/trainer.md'
                ]
            }
            ]
    }
}
