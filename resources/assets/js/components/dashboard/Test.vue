<template>
    <div id="wocao"></div>
</template>

<script>
    
    import WangEditor from 'wangeditor'

    export default {
        data () {
            return {
                uploadUrl: '',
                content: ''
            }
        },
        mounted() {
            this.createEditor()
        },
        methods: {
            createEditor() {
                const self = this
                const editor = new WangEditor('wocao')
                editor.config.menus = ['source', '|', 'bold', 'underline', 'italic', 'strikethrough', 'eraser', 'forecolor', 'bgcolor', '|', 'quote', 'fontfamily', 'fontsize', 'head', 'unorderlist', 'orderlist', 'alignleft', 'aligncenter', 'alignright',
                    '|', 'link', 'unlink', 'table', 'img', 'video', 'insertcode', '|', 'undo', 'redo', 'fullscreen'
                ]
                editor.config.uploadImgUrl = this.uploadUrl
                editor.onchange = function() {
                    self.formatContent(this.$txt.html())
                }
                editor.create()
            },
            formatContent(content) {
                this.content = content
                this.outputContent()
            }
        }

    }


</script>

<style lang="css" scoped>
    #wocao{
        height: 500px;
    }
    .wangEditor-container{
        border-radius: 2px;
        overflow: hidden;
        border: 1px solid #CCC;
    }
</style>