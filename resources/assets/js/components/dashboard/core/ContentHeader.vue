<template>
	<section class="content-header">
        <el-breadcrumb separator="/">
            <el-breadcrumb-item v-for="item in breadcrumbs"
            :to="item.url"
            >{{ item.value }}</el-breadcrumb-item>
        </el-breadcrumb>
    </section>
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