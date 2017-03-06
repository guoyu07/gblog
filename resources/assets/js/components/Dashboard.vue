<template>
    <div class="wrapper">
        <navbar></navbar>
        <sidebar></sidebar>

        <div class="content-wrapper">
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
