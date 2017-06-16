export default [
    {
        path: '/',
        component: require('./components/Main.vue'),
        children: [
            {
                path: '',
                components: {
                    default: require('./components/Index.vue')
                }
            },
            {
                path: 'aboutme',
                components: {
                    default: require('./components/Aboutme.vue')
                }
            },
            {
                path: 'aboutme2',
                components: {
                    default: require('./components/Aboutme.vue')
                }
            },
            {
                path: 'p',
                component: require('./components/PostDetail.vue')
            },
            {
                path: 'sign_in',
                component: require('./components/SignIn.vue')
            }
        ]
    },

]
