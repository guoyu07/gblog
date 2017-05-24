<template>
    <div>
        <breadcrumb :breadcrumbs="breadcrumbs" :name="'你好啊'"></breadcrumb>

        <simple-table :url="'/api/category/'"
            :title="'资源管理'"
            :tools="tools"
            :columns="columns"
            :option="option"></simple-table>

        <image-upload-dialog :show-dialog="showDialog"></image-upload-dialog>
    </div>
</template>

<script>

    import Breadcrumb from './particals/Breadcrumb.vue'
    import SimpleTable from './core/ElementTable.vue'
    import ImageUploadDialog from './core/ImageUploadDialog.vue'

    export default {
        components: {
            Breadcrumb,
            SimpleTable,
            ImageUploadDialog
        },
        data () {
            return {
                breadcrumbs: [
                    {
                        to: 'wocao',
                        name: '分类管理'
                    }
                ],
                tools: [
                    { name: '上传图片', onclick: 'processUpload'}
                ],
                columns: [
                    {prop: 'id', label: 'ID', width: '50'},
                    {prop: 'name', label: 'category.name'},
                    {prop: 'description', label: 'category.description'},
                    {prop: 'posts_count', label: 'category.posts_count'},
                    {prop: 'comments_count', label: 'category.comments_count'},
                    {prop: 'stars_count', label: 'category.stars_count'},
                    {prop: 'created_at', label: 'category.created_at'}
                ],
                option: {
                    label: '操作',
                    width: '180',
                    buttons: [
                        {name: '编辑', onclick: 'onEdit'},
                        {name: '删除', onclick: 'onDelete'},
                    ]
                },
                showDialog: false
            }
        },
        methods: {

            processUpload () {
                this.showDialog = true
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