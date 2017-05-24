<template>
<li class="nav-header">
	<div class="dropdown profile-element"> 
	    <span><img alt="image" class="img-circle" :src="user.avatar" /></span>
	    <a data-toggle="dropdown" class="dropdown-toggle" href="#" @click="show = !show">
	        <span class="clear">
	            <span class="block m-t-xs"> <strong class="font-bold">{{ user.name }}</strong></span>
	            <span class="text-muted text-xs block">{{ user.position }} <b class="caret"></b></span>
	        </span>
	    </a>
	    <transition name="el-fade-in-linear">
		    <ul class="dropdown-menu animated fadeInRight m-t-xs" style="display: block;" v-show="show">
		        <li><a href="profile.html">Profile</a></li>
		        <li><a href="contacts.html">Contacts</a></li>
		        <li><a href="mailbox.html">Mailbox</a></li>
		        <li class="divider"></li>
		        <li><a href="login.html">Logout</a></li>
		    </ul>
	    </transition>
	</div>
	<div class="logo-element">
	    IN+
	</div>
</li>
</template>

<script>

export default {
	props: {
		user: {
			type: Object,
			required: true
		}
	},
	data () {
		return {
			show: false
		}
	}
}
</script>