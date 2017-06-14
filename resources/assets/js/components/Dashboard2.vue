<template>
    <div id="wrapper">
        <sidebar :user="user"></sidebar>
        <div class="gray-bg" id="page-wrapper" :style="minHeight">
            <navbar></navbar>
            <router-view></router-view>
            <footer-bar></footer-bar>
        </div>
        <small-chat></small-chat>
    </div>
</template>

<script>

    import FooterBar from './dashboard/layouts/FooterBar/index.js'
    import SmallChat from './dashboard/layouts/SmallChat/index.js'
    import Sidebar from './dashboard/layouts/Sidebar/index.js'
    import Navbar from './dashboard/layouts/Navbar/index.js'

    export default {
        components: {
            FooterBar, SmallChat, Sidebar, Navbar
        },
        created () {
            this.$http.get('/api/user').then((res) => {
                this.user = res.data.data
            });
        },
        data () {
            return {
                user: {},
                minHeight: '500px'
            }
        }
    }
</script>
