<template>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ title }}</h5>
                        <div class="ibox-tools">
                            <el-button v-for="tool in tools"
                                :type="tool.type || 'primary'"
                                :size="tool.size || 'small'"
                                :icon="tool.icon || ''"
                                @click.native="handleToolClick(tool)">
                                {{ tool.name }}
                            </el-button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <el-table :data="tableData" style="width: 100%" border v-loading.body="loading">
                            <template v-for="column in columns">
                                <template v-if="column.showImg">
                                    <el-table-column inline-template :label="column.label">
                                        <a :href="row[column.prop]" target="_blank">
                                            <div :style="'width: 156px;height: 65px; background: url('+row[column.prop]+') center no-repeat; background-size:cover'"></div>
                                        </a>
                                    </el-table-column>
                                </template>
                                <template v-else>
                                    <el-table-column
                                        :prop="column.prop"
                                        :label="column.label"
                                        :width="column.width">
                                    </el-table-column>
                                </template>
                            </template>
                            <template v-if="option && option.buttons">
                                <el-table-column
                                  :label="option.label || '操作'"
                                  :width="option.label || '200'">
                                  <template scope="scope">
                                    <el-button v-for="button in option.buttons"
                                        :size="button.size || 'small'"
                                        :type="buttonType(button, scope.row)"
                                        @click="handleButtonClick(button, scope.row)">{{ buttonName(button, scope.row) }}
                                    </el-button>
                                  </template>
                                </el-table-column>
                            </template>
                        </el-table>
                        <simple-pagination
                            :perPage="pagination.per_page"
                            :total="pagination.total"
                            @handlePageChange="handlePageChange"
                            :currentPage="pagination.current_page">
                        </simple-pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import SimplePagination from './SimplePagination.vue'
    export default {
        name: 'SimpleTable',
        components: {SimplePagination},
        props: {
            url: {
                type: String,
                required: true
            },
            columns: {
                type: Array,
                required: true
            },
            option: {
                type: Object,
                default () {
                    return {}
                }
            },
            tools: {
                type: Array,
                default () {
                    return []
                }
            },
            title: {
                type: String,
                required: true
            }
        },
        data () {
            return {
                tableData: [],
                loading: false,
                pagination: {
                    total: 0,
                    per_page: 10,
                    current_page: 1
                },
                requestParams: {}
            }
        },
        created () {
            this.loadData()
        },
        methods: {
            handleButtonClick (button, row) {
                if (button.onclick) {
                    let result = this.$parent[button.onclick](row)
                    if (result && (typeof result === 'object')) {
                        this.tableData.forEach((iten, index) => {
                            if (item.id == result.id) {
                                this.tableData[index] = result
                            }
                        })
                    }
                }
            },
            loadData () {
                this.loading = true
                this.$http.get(this.generyUrl()).then((res) => {
                    if (res && res.data.code === 200) {
                        this.tableData = res.data.data.data
                        this.pagination.total = 0 | res.data.data.total
                        this.pagination.current_page = 0 | res.data.data.current_page
                        this.pagination.per_page = 0 | res.data.data.per_page
                    }
                    this.loading = false
                }, (err) => {
                    this.$message({message: '获取数据失败', type: 'error'})
                    this.loading = false
                })
            },

            handlePageChange (page, size) {
                this.pagination.current_page = page
                this.pagination.per_page = size
                this.loadData()
            },

            handleToolClick (button) {
                if (button.onclick) {
                    this.$parent[button.onclick]()
                }
            },

            submitForm (data) {
                this.requestParams = data
                this.loadData()
            },

            generyUrl () {
                let url = this.url
                if (url.indexOf('?') === -1) {
                    url += '?'
                } else {
                    url += '&'
                }

                url += 'page=' + this.pagination.current_page + '&per_page=' + this.pagination.per_page

                Object.keys(this.requestParams).forEach( (key) => {
                    url += '&' + key + '=' + this.requestParams[key]
                })

                return url
            },

            /**
             * @TODO 一次判断方法执行的两次， 待优化
             *
             */

            buttonName (button, row) {
                if (button.if) {
                    let result = this.$parent[button.if](row)
                    if (result && result.type) {
                        this.type = result.type
                    }

                    if (typeof result === 'string') {
                        return result
                    }

                    if (result.name) {
                        return result.name
                    }
                }
                return button.name
            },

            buttonType (button, row) {
                if (button.if) {
                    let result = this.$parent[button.if](row)
                    if (result && result.type) {
                        return result.type
                    }
                }
                return button.type || 'primary'
            }
        }
    }
</script>