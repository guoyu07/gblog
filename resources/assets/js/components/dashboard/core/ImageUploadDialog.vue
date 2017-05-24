<template>
    <el-dialog :title="title || '图片上传'" :visible.sync="show" @close="close">
        <el-upload
            class="upload-demo"
            drag
            :action="uploadUrl"
            with-credentials
            :on-progress="onProgress"
            :on-success="onSuccess"
            :on-error="onError"
            multiple>
                <i class="el-icon-upload"></i>
                <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
                <div class="el-upload__tip" slot="tip">只能上传jpg/png文件，且不超过500kb</div>
        </el-upload>
        <div slot="footer" class="dialog-footer">
            <el-button type="primary" :disabled="disabled" :loading="disabled" @click="show = false">确 定</el-button>
        </div>
    </el-dialog>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                default () {
                    return ''
                }
            },
            uploadUrl: {
                type: String,
                default () {
                    return ''
                }
            },
            showDialog: {
                type: Boolean,
                default () {
                    return false
                }
            }
        },
        methods: {
            onProgress (event, file, fileList) {
                this.disabled = true
            },

            onSuccess (response, file, fileList) {
                this.disabled = false
                this.$message({message: '上传文件成功', type: 'success'})
            },

            onError (err, file, fileList) {
                this.disabled = false
                this.$message({message: err || '上传文件失败', type: 'warning'})
            },

            close () {
                this.$parent.showDialog = false
            }
        },
        data () {
            return {
                disabled: false,
                show: false
            }
        },
        watch: {
            showDialog(show) {
                this.show = show ? true : false
            }
        }
    }
</script>