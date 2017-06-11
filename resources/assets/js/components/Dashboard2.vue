<template>
    <div id="wrapper">
        <sidebar :user="user"></sidebar>
        <div class="gray-bg" id="page-wrapper" :style="minHeight">
            <navbar></navbar>
            <footer-bar></footer-bar>
        </div>
        <small-chat></small-chat>
    </div>
</template>

<script>
    export default {
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
