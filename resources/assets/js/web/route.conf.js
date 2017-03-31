import Main from './components/Main.vue'
import PostDetail from './components/PostDetail.vue'
import SignIn from './components/SignIn.vue'

import Navbar from './components/common/Navbar.vue'
import Footer from './components/common/Footer.vue'

export default [
    {
        path: '/',
        component: Main,
        children: [
            {
                path: '',
                components: {
                    navbar: Navbar,
                    footer: Footer,
                    default: require('./components/Index.vue')
                }
            },
            {
                path: 'aboutme',
                components: {
                    navbar: Navbar,
                    footer: Footer,
                    default: require('./components/Aboutme.vue')
                }
            },
            {
                path: 'aboutme2',
                components: {
                    navbar: Navbar,
                    footer: Footer,
                    default: require('./components/Aboutme.vue')
                }
            },
            {
                path: 'p',
                component: PostDetail
            },
            {
                path: 'sign_in',
                component: SignIn
            }
        ]
    },

]
