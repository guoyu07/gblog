<template>
    <li :class="dropdown">
        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" aria-expanded="false" @click="showdropdown">
            <i class="fa fa-envelope"></i>  <span class="label label-warning">{{ data.length }}</span>
        </a>
        <ul class="dropdown-menu dropdown-messages">
            <template v-for="item in data">
                <li>
                    <div class="dropdown-messages-box">
                        <router-link :to="'/user/' + item.user.id" class="pull-left">
                            <img alt="image" class="img-circle" :src="item.user.avatar">
                        </router-link>
                        <div class="media-body">
                            <small class="pull-right">{{ item.created_at }}</small>
                            <strong>{{ item.desc }}</strong>. <br>
                            <small class="text-muted">{{ item.created_at_detail }}</small>
                        </div>
                    </div>
                </li>
                <li class="divider"></li>
            </template>
            <li>
                <div class="text-center link-block">
                    <a href="mailbox.html">
                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                    </a>
                </div>
            </li>
        </ul>
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
            dropdown: 'dropdown'
        }
    },
    created () {
        if (this.url) {
            this.$http.get(this.url).then((res) => {
                this.data = res.data.data
            })
        }
    },
    methods: {
        showdropdown () {
            if (this.dropdown == 'dropdown') {
                this.dropdown = 'dropdown open'
            } else {
                this.dropdown = 'dropdown'
            }
        }
    }
}
</script>