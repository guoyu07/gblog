<template>
	<li class="dropdown">
        <a class="dropdown-toggle count-info" :style="style" data-toggle="dropdown" href="#" aria-expanded="true" @click="show = !show">
            <i class="fa fa-bell"></i>  <span class="label label-primary">{{ data.length }}</span>
        </a>
        <transition name="el-fade-in-linear">
        <ul class="dropdown-menu dropdown-alerts" v-show="show" style="display: block;">
        	<template v-for="item in data">
	            <li>
	                <router-link :to="item.url">
	                    <div>
	                        <i class="fa fa-envelope fa-fw"></i> {{ item.desc }}
	                        <span class="pull-right text-muted small">{{ item.created_at }}</span>
	                    </div>
	                </router-link>
	            </li>
            	<li class="divider"></li>
        	</template>
            <li>
                <div class="text-center link-block">
                    <a href="notifications.html">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </li>
        </ul>
        </transition>
    </li>
</template>

<script>

export default {
    props: {
        url: {
            type: String,
            required: true
        }
    },
    data () {
        return {
            data: [],
            show: false
        }
    },
    created () {
        if (this.url) {
            this.$http.get(this.url).then((res) => {
                this.data = res.data.data
            })
        }
    },
    computed: {
        style() {
            return this.show ? 'background-color:white;' : ''
        }
    }
}
</script>
</script>