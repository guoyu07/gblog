<template>
    <div>
        <navbar></navbar>
        <router-view></router-view>
        <footer-bar></footer-bar>
    </div>
</template>

<script>
    import Navbar from './layouts/Navbar/index.js'
    import FooterBar from './layouts/Footer/index.js'

    export default {
        components: {
            Navbar,
            FooterBar
        }
    }

</script>