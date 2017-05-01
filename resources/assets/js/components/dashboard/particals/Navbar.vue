<template>
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu">
                <navbar-header :user="user"></navbar-header>
                <navbar-item 
                    :menu-item="menu" 
                    :index="index" 
                    :active-index="activeIndex"
                    @setActive="setCurrentClickActive" 
                    v-for="(menu, index) in menus">
                </navbar-item>
            </ul>
        </div>
    </nav>
</template>

<script>
import menus from './../../../config/menu.js'
import NavbarItem from './NavbarItem.vue'
import NavbarHeader from './NavbarHeader.vue'
export default {
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    data () {
        return {
            menus: menus,
            activeIndex: -1
        }    
    },
    components: {
        NavbarItem,
        NavbarHeader
    },
    methods: {
        setCurrentClickActive (index) {
            this.activeIndex = index
        }
    }
}
</script>