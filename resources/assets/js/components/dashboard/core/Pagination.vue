<template>
    <div class="box-footer text-center block">
      <el-pagination
          @size-change="handleSizeChange"
          @current-change="handleCurrentChange"
          :current-page="currentPage"
          :page-sizes="pageSizes"
          :page-size="pageSize"
          :layout="layout"
          :total="total">
      </el-pagination>
    </div>
</template>
<script>
export default {
    props: {
        currentPage: {
            type: Number,
            default() {
                return 1
            }
        },
        pageSizes: {
            type: Array,
            default() {
                return [10, 15, 20, 50, 100]
            }
        },
        pageSize: {
            type: Number,
            default() {
                return 10
            }
        },
        total: {
            type: Number,
            required: true
        },
        layout: {
            type: String,
            default() {
                return 'total, sizes, prev, pager, next, jumper'
            }
        }
    },
    methods: {
        handleSizeChange(size) {
            this.$emit('paginationChange', this.currentPage, size)
        },
        handleCurrentChange(currentPage) {
            this.$emit('paginationChange', currentPage, this.pageSize)
        }
    }
}
</script>
