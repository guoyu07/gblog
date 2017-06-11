<template>
    <li class="dropdown">
        <router-link class="dropdown-toggle count-info" data-toggle="dropdown" to="" aria-expanded="false">
            <i class="fa fa-envelope"></i>
            <span :class="'label label-' + dropdown.labelClass ">{{ dropdown.data.length }}</span>
        </router-link>
        <template v-if="dropdown.data && dropdown.data.length > 0">
            <ul :class="'dropdown-menu ' + dropdown.ulClass">
                <template v-for="item in dropdown.data">
                    <slot data="item" :name="dropdown.slotName"></slot>
                    <li class="divider"></li>
                </template>
                <li>
                    <div class="text-center link-block">
                        <router-link :to="dropdown.sellAll.url">
                            <strong>{{ dropdown.sellAll.msg }}</strong>
                            <i :class="'fa ' + dropdown.sellAll.class"></i>
                        </router-link>
                    </div>
                </li>
            </ul>
        </template>
    </li>
</template>

<script>
export default {
    created () {
        console.log(this.dropdown)
    },
    props: {
        dropdown: {
            type: Object,
            required: true
        }
    }
}
</script>