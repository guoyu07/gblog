<template>
    <div>
        <breadcrumb :breadcrumbs="[{to:'wocao',name:'分类管理'}]" :name="'分类管理'"></breadcrumb>
        <simple-table :url="'/api/category/'"
            ref="table"
            :title="'分类管理'"
            :tools="tools"
            :columns="columns"
            :option="option">
        </simple-table>
    </div>
</template>

<script>

    import Breadcrumb from './layouts/Common/Breadcrumb.vue'
    import SimpleTable from './layouts/Common/SimpleTable.vue'

    export default {
        components: {
            Breadcrumb,
            SimpleTable
        },
        data () {
            return {
                tools: [
                    { name: '添加分类', onclick: 'addCategory', icon: 'plus'}
                ],
                columns: [
                    {prop: 'id', label: 'ID'},
                    {prop: 'avatar', label: '头像', showImg: true},
                    {prop: 'name', label: '分类名'},
                    {prop: 'description', label: '描述'},
                    {prop: 'posts_count', label: '文章数'},
                    {prop: 'comments_count', label: '评论数'},
                    {prop: 'created_at', label: '创建时间'}
                ],
                option: {
                    buttons: [
                        {name: '编辑', onclick: 'onEdit'},
                        {name: '删除', onclick: 'onDelete'},
                        {onclick: 'closeOrstart', if: 'ifCallback'},
                    ]
                },
                categoryTitle: '添加分类',
                dialogForm: {},
                showDialog: false,
                api: {
                    upload: '/api/upload.icon',
                    createOrUpdate: '/api/category'
                }
            }
        },
        methods: {

            addCategory () {
                alert(1)
            },

            ifCallback (row) {
                if (row.isstart == 1) {
                    return {name: '关闭', type: 'warning'}
                }
                return {name: '开启', type: 'success'}
            },

            onEdit (row) {
                console.log(row)
            },

            onDelete (row) {
                console.log(row)
            }
        }
    }
</script>
<style>
    input[type='file'] {
        display: none;
    }
</style>