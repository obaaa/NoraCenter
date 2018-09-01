module.exports = {
    title: 'Nora Center (beta)',
    description: "Education Management System",
    themeConfig:{
        nav: [
            { text: 'Home', link: '/' },
            { text: 'Features', link: '/features/' },
            { text: 'documentation', link: '/content/' },
            { text: 'About', link: '/about' },
            { text: 'Obaaa', link: 'http://obaaa.sd' },
        ],
        sidebar: [
          ['/content/', 'Content'],
          // ['/register_login/', 'Register & login'],
          //   {
          //       title: 'Setting',
          //       children: [
          //       '/setting/application_setting.md',
          //       '/setting/branche.md',
          //       '/setting/classroom.md',
          //       '/setting/classroom_lectures.md',
          //       '/setting/specialties.md',
          //       '/setting/courses.md',
          //       '/setting/manager.md'
          //       ]
          //   },
          //   {
          //       title: 'Staff',
          //       children: [
          //       '/staff/receptionist.md',
          //       '/staff/accountant.md',
          //       '/staff/trainer.md'
          //       ]
          //   }
            ]
    }
}
