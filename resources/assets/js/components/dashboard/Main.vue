<template>
	<div>
		<breadcrumb :breadcrumbs="breadcrumbs" :name="'你好啊'"></breadcrumb>
	    <div class="wrapper wrapper-content animated fadeInRight"></div>
	</div>
</template>

<script>
	import Breadcrumb from './particals/Breadcrumb.vue'
	export default {
		components: {
            Breadcrumb
        },
        data () {
            return {
                breadcrumbs: [
                    {
                        to: 'wocao',
                        name: '首页'
                    },
                    {
                        to: 'wocao',
                        name: '首页'
                    },
                    {
                        name: '卧槽'
                    }
                ]
            }
        }
	}
</script>