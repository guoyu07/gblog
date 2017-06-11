import FooterBar from './FooterBar/index.js'
import SmallChat from './SmallChat/index.js'
import Sidebar from './Sidebar/index.js'
import Navbar from './Navbar/index.js'

const components = [
    Sidebar,
    FooterBar,
    SmallChat,
    Navbar
]

const install = function(Vue, opts = {}) {
    console.log(install)
    if (install.installed) {
        return
    }

    components.map(component => {
        Vue.component(component.name, component)
    })
}

if (typeof window !== 'undefined' && window.Vue) {
    install(window.Vue)
}
