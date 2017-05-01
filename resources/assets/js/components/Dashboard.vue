<template>
    <div id="wrapper">
        <navbar :user="user"></navbar>
        <div class="gray-bg" id="page-wrapper" :style="minHeight">
            <header-main></header-main>
            <router-view></router-view>
            <footer-compontent></footer-compontent>
        </div>
        <small-chat ></small-chat>
    </div>
</template>

<script>
    import Navbar from './dashboard/particals/Navbar.vue'
    import SmallChat from './dashboard/core/SmallChat.vue'
    import HeaderMain from './dashboard/particals/HeaderMain.vue'
    import FooterCompontent from './dashboard/particals/Footer.vue'

    export default {
        components: {
            Navbar,
            HeaderMain,
            FooterCompontent,
            SmallChat
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
