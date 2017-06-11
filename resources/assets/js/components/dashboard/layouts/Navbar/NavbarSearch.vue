<template>
<div class="navbar-header">
    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#" @click="minBody">
    	<i class="fa fa-bars"></i>
    </a>
    <form role="search" class="navbar-form-custom" action="search_results.html">
        <div class="form-group">
            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
        </div>
    </form>
</div>
</template>

<script>
	export default {
		methods: {
			minBody () {
				let body = document.body;
				if (body.className && body.className.indexOf('mini-navbar') >= 0) {
					body.className = body.className.replace('mini-navbar', '')
				} else {
					body.className += ' mini-navbar'
				}
			}
		}
	}
</script>