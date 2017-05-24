import Dashboard from './components/Dashboard.vue'

export default [
    {
        path: '/dashboard',
        component: Dashboard,
        children: [
            {
                path: '/',
                redirect: '/dashboard/home'
            },
            {
                path: 'home',
                component: require('./components/dashboard/Home.vue')
            },
            {
                path: 'category',
                component: require('./components/dashboard/Category.vue')
            },
            {
                path: 'storage',
                component: require('./components/dashboard/Storage.vue')
            },
            {
                path: 'test',
                component: require('./components/dashboard/Test.vue')
            }
        ]
    }
]
