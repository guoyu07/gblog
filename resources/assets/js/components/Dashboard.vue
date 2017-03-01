<template>
    <div>
        <el-row type="flex" justify="end">
            <el-col :span=3>
                icon
            </el-col>
            <el-col :span="21">
                <navbar></navbar>
            </el-col>
        </el-row>
        <el-row>
            <el-col :span="3">
                <sidebar></sidebar>
            </el-col>
            <el-col :span="21">
                <router-view></router-view>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    import Sidebar from './dashboard/particals/Sidebar.vue';
    import Navbar from './dashboard/particals/Navbar.vue';

    export default {
        components: {
            Sidebar,
            Navbar
        }
    }
</script>
<style lang="scss">
    body {
        margin: 0;
    },
    .el-menu{
        border-radius: 0;
    }
</style>
