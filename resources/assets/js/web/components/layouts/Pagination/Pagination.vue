<template>
    <nav class="pagination">
        <a href="" :class="pagination__arrow arrow--left "><svg class="pagination__icon"><use xlink:href="#icon-arrow-left"></use></svg> {{ previous }}</a>
        <a href="" :class="pagination__arrow arrow--right "> {{ next }}<svg class="pagination__icon"><use xlink:href="#icon-arrow-right"></use></svg></a>
    </nav>
</template>

<script>
    export default {
        props: {
            previous: {
                type: String,
                default () {
                    return 'New Blog'
                }
            },
            next: {
                type: String,
                default () {
                    return 'Old Blog'
                }
            },
            currentPage: {
                type: Number,
                required: true
            },
            total: {
                type: Number,
                required: true
            }
        },
        data () {
            return {
                disableClass: 'btn--disabled'
            }
        }
    }
</script>