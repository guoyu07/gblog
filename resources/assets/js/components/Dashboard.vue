<template>
    <div>
        <navbar></navbar>
        <sidebar></sidebar>
        <div>
            <router-view></router-view>
        </div>
    </div>
</template>


<script>
    import Sidebar from './dashboard/particals/Sidebar.vue';
    import Navbar from './dashboard/particals/Navbar.vue';

    export default {
        components: {
            Sidebar,
            Navbar
        }
    }
</script>
