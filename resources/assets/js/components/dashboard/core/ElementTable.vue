<template>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ title }}</h5>
                        <div class="ibox-tools">
                            <el-button v-for="but in tools" 
                                :type="but.type || 'primary'" 
                                :size="but.size || 'small'" 
                                @click.native="handleButtonClick(but)">
                                {{ but.name }}
                            </el-button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <el-table :data="tableData" border style="width: 100%" v-loading.body="loading">
                            <template v-for="column in columns">
                                <el-table-column
                                    :prop="column.prop"
                                    :label="column.label"
                                    :width="column.width"
                                ></el-table-column>
                            </template>
                            <template v-if="option">
                                <el-table-column :label="option.label" :width="option.width">
                                    <template scope="scope">
                                        <el-button v-for="opt in option.buttons"
                                            @click.native.prevent="handleOptions(opt, scope.row)"
                                            :type="opt.type || 'primary'"
                                            :size="opt.size || 'small'"> {{ opt.name }} </el-button>
                                    </template>
                                </el-table-column>
                            </template>
                        </el-table>
                        <table-pagination
                            :total='pagination.total'
                            :currentPage='pagination.current_page'
                            :pageSize='pagination.per_page'
                            @paginationChange="paginationChange"
                            v-if="showPagination">
                        </table-pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import TablePagination from './Pagination.vue'
    export default {

        props: {
            showPagination: {
                type: Boolean,
                default () {
                    return true
                }
            },
            url: {
                type: String,
                required: true
            },
            title: {
                type: String,
                required: true
            },
            tools: {
                type: Array,
                default () {
                    return []
                }
            },
            columns: {
                type: Array,
                default () {
                    return []
                }
            },
            option: {
                type: Object,
                required: true
            }
        },
        created () {
            this.loadData()
        },
        methods: {
            loadData () {
                this.$http.get(this.gennerUrl()).then((res) => {
                    this.pagination.per_page = res.data.data.per_page
                    this.pagination.current_page = res.data.data.current_page
                    this.pagination.total = res.data.data.total
                    this.tableData = res.data.data.data
                })
            },

            gennerUrl () {
                return this.url + '?page=' + this.pagination.current_page + '&per_page=' + this.pagination.per_page
            },

            paginationChange(currentPage, size){
                this.pagination.per_page = (0 | size)
                this.pagination.current_page = (0 | currentPage)
                this.loadData()
            },

            handleButtonClick (button) {
                this.$parent[button.onclick]()
            },

            handleOptions (but, row) {
                this.$parent[but.onclick](row)
            }
        },
        components: {
            TablePagination
        },
        data () {
            return {
                loading: false,
                tableData: [],
                pagination: {
                    total: 0,
                    per_page: 10,
                    current_page: 1
                }
            }
        }
    }
</script>