<template>
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li v-for="menu in menus">
                <router-link :to="menu.url ? menu.url : '#'">
                    <i :class="'fa ' + menu.icon "></i>
                    <span>{{ $t(menu.label) }}</span>
                    <template v-if="menu.span">
                        <span class="pull-right-container">
                            <small :class="'label pull-right ' + spanIten.icon " v-for="spanIten in menu.span">{{ spanIten.value }}</small>
                        </span>
                    </template>
                    <template v-if="menu.child">
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </template>
                </router-link>
                <template v-if="menu.child">
                    <ul class="treeview-menu">
                        <li v-for="child in menu.child">
                            <router-link :to="child.url">
                                <i :class="'fa ' + child.icon"></i> {{ $t(child.label) }}
                            </router-link>
                        </li>
                    </ul>
                </template>
          </li>
      </ul>
    </section>
  </aside>
</template>

<script type="text/javascript">
import menus from './../../../config/menu.js';
export default {
    data() {
        return {
            menus: menus
        }
    }
};
</script>
