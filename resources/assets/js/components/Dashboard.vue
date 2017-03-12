<template>
    <div class="wrapper">
        <Navbar></Navbar>
        <Sidebar></Sidebar>
        <router-view></router-view>
        <FooterBar></FooterBar>
    </div>
</template>

<script>
    import Sidebar from './dashboard/particals/Sidebar.vue';
    import Navbar from './dashboard/particals/Navbar.vue';
    import FooterBar from './dashboard/particals/FooterBar.vue';

    export default {
        components: {
            Sidebar,
            Navbar,
            FooterBar
        }
    }
</script>
