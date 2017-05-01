<template>
    <g-table :title="title" :data-url="dataUrl">
        <div slot="breadcrumb-item">
            <el-breadcrumb-item>{{ $t('category.manage') }}</el-breadcrumb-item>
        </div>
        <div slot="tools-add-button">
            <el-button type="primary" class="hvr-wobble-top" icon="plus" size="small" @click="uploadDialog = true">{{ $t('category.new' )}}</el-button>

            <el-dialog title="上传图片" v-model="uploadDialog">
                <el-upload
                  class="upload-demo"
                  drag
                  action="https://jsonplaceholder.typicode.com/posts/"
                  multiple>
                  <i class="el-icon-upload"></i>
                  <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
                  <div class="el-upload__tip" slot="tip">只能上传jpg/png文件，且不超过500kb</div>
                </el-upload>

                <div slot="footer" class="dialog-footer">
                    <el-button @click="uploadDialog = false">取 消</el-button>
                    <el-button type="primary" @click="uploadDialog = false">确 定</el-button>
                </div>
            </el-dialog>

        </div>
        <div slot="g-table-column">

            <el-table-column inline-template :label="$t('category.optionname')"  width="220">
                <template>
                    <el-button class="hvr-wobble-top" type="warning" size="small">{{ $t('category.delete')}}</el-button>
                </template>
            </el-table-column>

            <el-table-column prop="id" label="ID" sortable width="80"> </el-table-column>
            <el-table-column prop="name" :label="$t('category.name')"></el-table-column>
            <el-table-column prop="description" :label="$t('category.description')" show-overflow-tooltip> </el-table-column>
            <el-table-column prop="posts_count" :label="$t('category.posts_count')"> </el-table-column>
            <el-table-column prop="comments_count" :label="$t('category.comments_count')"> </el-table-column>
            <el-table-column prop="stars_count" :label="$t('category.stars_count')"> </el-table-column>
            <el-table-column prop="created_at" :label="$t('category.created_at')" show-overflow-tooltip> </el-table-column>
            <el-table-column prop="isstart" :label="$t('category.isstart')"
                :filters="[{ text: 'YES', value: 'YES' }, { text: 'NO', value: 'NO' }]"
                :filter-method="filterTag">
                <template scope="scope">
                    <el-tag v-if="((0 | scope.row.isstart) === 0)" type="danger" close-transition>NO</el-tag>
                    <el-tag v-else type="success" close-transition>YES</el-tag>
                </template>
            </el-table-column>
        </div>
    </g-table>

</template>
<script>
    import GTable from './core/Table.vue'
    export default {

        data() {
            return {
                title: 'woshititle',
                dataUrl: '/api/category',
                uploadDialog: false
            }
        },
        components: {
            GTable,
        },
        methods: {
            paginationChange(currentPage, size) {
                console.log(currentPage)
                console.log('-------' + size)
            },
            filterTag(value, row) {
              let tmp = row.isstart === 1 ? 'YES' : 'NO'
              return tmp === value;
            },
        }
    }
</script>
<style>
    
    input[type=file] {
        display: none;
    }
</style>
