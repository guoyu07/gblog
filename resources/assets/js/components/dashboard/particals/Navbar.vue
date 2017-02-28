<template>
    <el-menu theme="dark"
        :default-active="activeIndex"
        mode="horizontal"
        class="navabar"
        @select="handleSelect"
        >
        <el-row type="flex" justify="end">
            <el-menu-item index="1">处理中心</el-menu-item>
            <el-submenu index="2">
                <template slot="title">我的工作台</template>
                <el-menu-item index="2-1">选项1</el-menu-item>
                <el-menu-item index="2-2">选项2</el-menu-item>
                <el-menu-item index="2-3">选项3</el-menu-item>
            </el-submenu>
            <el-menu-item index="3"><a href="https://www.ele.me" target="_blank">订单管理</a></el-menu-item>
        </el-row>
    </el-menu>
</template>

<script>
    export default {
        data() {
          return {
            activeIndex: '1'
          };
        },
        methods: {
          handleSelect(key, keyPath) {
            console.log(key, keyPath);
          }
        }
    }
</script>
<style lang="scss">
    body {
        margin: 0;
    },
    .navabar {
        border-radius: 0;
    }
</style>
