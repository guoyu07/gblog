<template>
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu">
                <sidebar-header :user="user"></sidebar-header>
                <sidebar-item 
                    :menu-item="menu" 
                    :index="index" 
                    :active-index="activeIndex"
                    @setActive="setCurrentClickActive" 
                    v-for="(menu, index) in menus">
                </sidebar-item>
            </ul>
        </div>
    </nav>
</template>

<script>
import menus from './../../../../config/menu.js'
import SidebarItem from './SidebarItem.vue'
import SidebarHeader from './SidebarHeader.vue'
export default {
    name: 'Sidebar',
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
        SidebarItem,
        SidebarHeader
    },
    methods: {
        setCurrentClickActive (index) {
            this.activeIndex = index
        }
    }
}
</script>