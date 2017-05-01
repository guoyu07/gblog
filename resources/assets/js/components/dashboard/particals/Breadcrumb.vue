<template>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ name }}</h2>
            <el-breadcrumb separator="/" class="breadcrumb">
                <el-breadcrumb-item :to="home">首页</el-breadcrumb-item>
                <el-breadcrumb-item 
                    v-for="breadcrumb in breadcrumbs" 
                    :to="breadcrumb.to">
                    {{ breadcrumb.name }}
                </el-breadcrumb-item>
            </el-breadcrumb>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            breadcrumbs: {
                type: Array,
                default: function () {
                    return []
                }
            },
            name: {
                type: String,
                default: function () {
                    return ''
                }
            }
        }
    }
</script>