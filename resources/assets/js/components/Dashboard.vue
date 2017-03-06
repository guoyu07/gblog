<template>
    <div class="wrapper">
            <Navbar></Navbar>
        <Sidebar></Sidebar>

        <div class="content-wrapper">
        
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
    import Sidebar from './dashboard/particals/Sidebar.vue';
    import Navbar from './dashboard/particals/Navbar.vue';
    import Footer from './dashboard/particals/FooterBar.vue';

    export default {
        components: {
            Sidebar,
            Navbar,
            Footer
        }
    }
</script>
