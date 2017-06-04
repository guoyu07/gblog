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
    
        <el-dialog :title="categoryTitle" :visible.sync="showDialog" size="tiny">
            <el-form :model="dialogForm">
                <el-form-item>
                    <el-input v-model="dialogForm.name"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-input v-model="dialogForm.description" type="textarea" :rows="4"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-select v-model="dialogForm.isstart" placeholder="请选择">
                        <el-option label="开启" value="1"></el-option>
                        <el-option label="关闭" value="0"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item>
                    <el-upload
                        class="upload-demo"
                        name="icon"
                        :action="api.upload"
                        list-type="picture"
                        :on-success="handleAvatarSuccess"
                        :before-upload="handleAvatarBefore"
                        :on-remove="handleAvatarRemove"
                        :on-error="handleAvatarError">
                        <el-button size="small" type="primary">点击上传</el-button>
                        <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
                    </el-upload>
                </el-form-item>
              </el-form>
              <div slot="footer" class="dialog-footer">
                  <el-button @click="showDialog = false">取 消</el-button>
                  <el-button type="primary" @click="submit">确 定</el-button>
              </div>
        </el-dialog>
    </div>
</template>

<script>

    import Breadcrumb from './particals/Breadcrumb.vue'
    import SimpleTable from './core/ElementTable.vue'

    export default {
        components: {
            Breadcrumb,
            SimpleTable
        },
        data () {
            return {
                tools: [
                    { name: '添加分类', onclick: 'addCategory'}
                ],
                columns: [
                    {prop: 'id', label: 'ID', width: '50'},
                    {prop: 'avatar', label: '头像', width: '100'},
                    {prop: 'name', label: '分类名'},
                    {prop: 'description', label: '描述'},
                    {prop: 'posts_count', label: '文章数', width: '80'},
                    {prop: 'comments_count', label: '评论数', width: '80'},
                    {prop: 'created_at', label: '创建时间'}
                ],
                option: {
                    label: '操作',
                    width: '180',
                    buttons: [
                        {name: '编辑', onclick: 'onEdit'},
                        {name: '删除', onclick: 'onDelete'},
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
                this.showDialog = true
            },

            onEdit (row) {
                console.log(row)
            },

            onDelete (row) {
                console.log(row)
            },

            submit() {
                this.$http.post(this.api.createOrUpdate, this.dialogForm).then((res) => {
                    if (res && res.data.code === 200) {
                        this.$message({message: '保存成功', type: 'success'})
                        this.showDialog = false
                        this.$refs.table.loadData()
                    } else {
                        this.$message({message:res.data.message, type: 'error'})
                    }
                })
            },

            handleAvatarSuccess(response, file, fileList){
                
                if (response && response.code === 200) {
                    this.dialogForm.avatar = response.data.icon
                } else {
                    this.$message({message:'上传失败', type: 'error'})
                }
            },

            handleAvatarError(err, file, fileLis){
                this.$message({message:err, type: 'error'})
            },

            handleAvatarRemove () {
                this.dialogForm.avatar = undefined
            },

            handleAvatarBefore(){
                if (this.dialogForm.avatar) {
                    this.$message({message: '只能上传一张图片', type: 'error'})
                    return false
                }
                return true
            }
        }
    }
</script>
<style>
    input[type='file'] {
        display: none;
    }
</style>