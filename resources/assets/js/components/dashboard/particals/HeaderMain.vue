<template>
<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation">
        <header-search></header-search>
        <ul class="nav navbar-top-links navbar-right">
            <li><span class="m-r-sm text-muted welcome-message">Welcomr to gblog</span></li>
            <header-drop-down-message :url="notifiMsgUrl"></header-drop-down-message>
            <header-drop-down-message-box :url="notifiBoxUrl"></header-drop-down-message-box>
            <li> <a href="login.html"> <i class="fa fa-sign-out"></i> Sign_out </a> </li>
        </ul>
    </nav>
</div>
</template>
<script>

import HeaderSearch from './HeaderSearch.vue'
import HeaderDropDownMessage from './HeaderDropDownMessage.vue'
import HeaderDropDownMessageBox from './HeaderDropDownMessageBox.vue'

export default {
    data () {
        return {
            notifiMsgUrl: '/api/notification/message',
            notifiBoxUrl: '/api/notification/messagebox'
        }
    },
    components: {
        HeaderSearch,
        HeaderDropDownMessage,
        HeaderDropDownMessageBox
    }
}
</script>
<style>
    .navbar {
        margin-bottom: 0px;
    }
</style>