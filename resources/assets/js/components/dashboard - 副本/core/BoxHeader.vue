<template>
	<div class="box-header">
		<h3 class="box-title">{{ title }}</h3>
		<div class="box-tools">
			<slot name="tools-add-button"></slot>
		</div>
	</div>
</template>

<script>

export default {
	data () {
		return {

		}
	},
	props: {
		breadcrumbs: {
			type: Array
		}
	}
}
</script>