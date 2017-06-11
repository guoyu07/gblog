<template>
    <div id="small-chat" v-if="show">
        <span class="badge badge-warning pull-right">5</span>
        <a class="open-small-chat">
            <i class="fa fa-comments"></i>
        </a>
    </div>
</template>
<script>
    export default {
        name: 'SmallChat',
        props: {
            show: {
                type: Boolean,
                default () {
                    return true
                }
            },
            url: {
                type: String,
                default () {
                    return ''
                }
            }
        }
    }
</script>