import Navbar from './NavbarMain'

Navbar.install = function(Vue) {
    Vue.component(Navbar.name, Navbar)
}

export default Navbar