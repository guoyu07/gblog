<template>
    <div class="box-footer clearfix text-center">
        <el-pagination
          @size-change="handleSizeChange"
          @current-change="handleCurrentChange"
          :current-page="currentPage"
          :page-sizes="pageSizes"
          :page-size="perPage"
          :layout="layout"
          :total="total">
        </el-pagination>
    </div>
</template>

<script>
    export default {
        name: 'SimplePagination',
        props: {
            pageSizes: {
                type: Array,
                default () {
                    return [10, 25, 50, 100]
                }
            },
            perPage: {
                type: [String, Number],
                default () {
                    return 10
                }
            },
            layout: {
                type: String,
                default () {
                    return 'total, sizes, prev, pager, next, jumper'
                }
            },
            total: {
                type: [String, Number],
                required: true
            },
            currentPage: {
                type: [String, Number],
                default () {
                    return 1
                }
            }
        },
        methods: {
            handleSizeChange (size) {
                // this.$parent.handlePageChange(this.currentPage, size);
                this.$emit('handlePageChange', this.currentPage, size)
            },
            handleCurrentChange (page) {
                // this.$parent.handlePageChange(page, this.perPage);
                this.$emit('handlePageChange', page, this.perPage)
            }
        }
    }
</script>