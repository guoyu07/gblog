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
            }
        ]
    }
]
