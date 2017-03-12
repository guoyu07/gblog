<template>
    <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>User name</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
          <li v-for="menu in menus">
            <a :href="menu.url ? menu.url : '#'">
              <i :class="'fa ' + menu.icon "></i>
              <span>{{ $t(menu.label) }}</span>
              <template v-if="menu.span">
                <span class="pull-right-container">
                  <small :class="'label pull-right ' + spanIten.icon " v-for="spanIten in menu.span">{{ spanIten.value }}</small>
                </span>
              </template>
              <template v-else>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </template>
            </a>
            <template v-if="menu.child">
              <ul  class="treeview-menu">
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
    <!-- /.sidebar -->

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