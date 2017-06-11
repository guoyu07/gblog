<template>
<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation">
        <navbar-search></navbar-search>
        <ul class="nav navbar-top-links navbar-right">
            <li><span class="m-r-sm text-muted welcome-message">Welcomr to gblog</span></li>
            <navbar-drop-down-message :url="notifiMsgUrl"></navbar-drop-down-message>
            <navbar-drop-down-message-box :url="notifiBoxUrl"></navbar-drop-down-message-box>
            <li> <a href="login.html"> <i class="fa fa-sign-out"></i> Sign_out </a> </li>
        </ul>
    </nav>
</div>
</template>
<script>

import NavbarSearch from './NavbarSearch.vue'
import NavbarDropDownMessage from './NavbarDropDownMessage.vue'
import NavbarDropDownMessageBox from './NavbarDropDownMessageBox.vue'

export default {
    name: 'Navbar',
    data () {
        return {
            notifiMsgUrl: '/api/notification/message',
            notifiBoxUrl: '/api/notification/messagebox'
        }
    },
    components: {
        NavbarSearch,
        NavbarDropDownMessage,
        NavbarDropDownMessageBox
    }
}
</script>
<style>
    .navbar {
        margin-bottom: 0px;
    }
</style>