<template>
    <div>
        <breadcrumb :breadcrumbs="breadcrumbs" :name="'文章发布'"></breadcrumb>
    
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <el-form ref="form" :model="form">
                                <el-form-item>
                                    <el-input v-model="form.name" placeholder="文章标题"></el-input>
                                </el-form-item>
                                <el-form-item>
                                    <el-select v-model="form.category" placeholder="请选择文章分类">
                                        <el-option label="区域一" value="shanghai"></el-option>
                                        <el-option label="区域二" value="beijing"></el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item>
                                    <el-upload
                                        class="upload-demo"
                                        drag
                                        action="https://jsonplaceholder.typicode.com/posts/"
                                        multiple>
                                        <i class="el-icon-upload"></i>
                                        <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
                                    </el-upload>
                                </el-form-item>
                                <el-form-item>
                                    <el-input placeholder="文章简介，不填写将自动截取文章内容首部" type="textarea" :rows="4" v-model="form.desc"></el-input>
                                </el-form-item>
                                <el-form-item>
                                    <markdown-editor 
                                        v-model="form.content" 
                                        :configs="configs"
                                        preview-class="markdown-body"
                                        :custom-theme="true" 
                                        ref="markdownEditor">
                                    </markdown-editor>
                                </el-form-item>
                                <el-form-item>
                                    <el-button type="primary" size="large" icon="edit" @click="publish" style="margin: auto 50%;">发布文章</el-button>
                                </el-form-item>
                            </el-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Breadcrumb from './particals/Breadcrumb.vue'
    import Vue from 'vue'
    import VueSimplemde from 'vue-simplemde'

    Vue.use(VueSimplemde)

    import 'simplemde-theme-base/dist/simplemde-theme-base.min.css'
    // import 'github-markdown-css'
    import { markdownEditor } from 'vue-simplemde'

    export default {
        components: {
            Breadcrumb,
            markdownEditor
        },
        data () {
            return {
                breadcrumbs: [
                    {
                        to: 'wocao',
                        name: '文章发布'
                    }
                ],
                form: {},
                configs: {
                    initialValue: '文章内容',
                    renderingConfig: {
                      codeSyntaxHighlighting: true,
                      //代码高亮主题参看https://github.com/isagalaev/highlight.js
                      highlightingTheme: 'atom-one-dark'
                    }
                },
                api: {
                    publish: '/api/article/publish'
                }
            }
        },
        methods: {
            publish () {
                this.$http.post(this.api.publish, this.form).then((res) => {
                    if (res && res.data.code === 200) {
                        this.$message({
                            message: 'Publish Success',
                            type: 'success'
                        })
                    }
                })
            }
        }
    }
</script>
<style>
    input[type="file"] {
        display: none;
    }

    .editor-toolbar.fullscreen{
        z-index: 2002!important;
    }
    
    .CodeMirror-fullscreen {
        z-index: 2002!important;
    }
</style>