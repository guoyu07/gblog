<template>
<li class="nav-header">
	<div :class="'dropdown profile-element' + openClass"> 
	    <span><img alt="image" class="img-circle" :src="user.avatar" /></span>
	    <a data-toggle="dropdown" class="dropdown-toggle" href="#" @click="showProfile" :aria-expanded="hasShow">
	        <span class="clear">
	            <span class="block m-t-xs"> <strong class="font-bold">{{ user.name }}</strong></span>
	            <span class="text-muted text-xs block">{{ user.position }} <b class="caret"></b></span>
	        </span>
	    </a>
	    <ul class="dropdown-menu animated fadeInRight m-t-xs">
	        <li><a href="profile.html">Profile</a></li>
	        <li><a href="contacts.html">Contacts</a></li>
	        <li><a href="mailbox.html">Mailbox</a></li>
	        <li class="divider"></li>
	        <li><a href="login.html">Logout</a></li>
	    </ul>
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
			hasShow: false,
			openClass: ''
		}
	},
	methods: {
		showProfile () {
			if (this.openClass || this.hasShow) {
				this.openClass = ''
				this.hasShow = false
			} else {
				this.openClass = ' open'
				this.hasShow = true
			}
		}
	}
}
</script>