<template>
    <div>
        <el-row>
            <navbar></navbar>
        </el-row>
        <el-row>
            <el-col :span="4">
                <sidebar></sidebar>
            </el-col>
            <el-col :span="20">
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
