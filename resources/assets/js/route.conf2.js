import Dashboard from './components/Dashboard2.vue'

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
            }
        ]
    }
]
