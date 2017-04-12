<template>
<div class="content-wrapper">
    <section class="content-header">
        <el-breadcrumb separator="/">
            <el-breadcrumb-item :to="{ path: '/dashboard' }">{{ $t('page.home') }}</el-breadcrumb-item>
            <slot name="breadcrumb-item"></slot>
        </el-breadcrumb>
    </section>
  <section class="content">
      <div class="box">
          <div class="box-header">
              <h3 class="box-title">{{ title }}</h3>
              <div class="box-tools">
                  <slot name="tools-add-button"></slot>
              </div>
          </div>
        <div class="box-body table-responsive">
            <el-table :data="tableData" border style="width: 100%" v-loading.body="tableLoading">
              <slot name="g-table-column"></slot>
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
  </section>
</div>
</template>
<script>

import TablePagination from './Pagination.vue'

export default {
    props: {
        title: {
            type: String,
            default() {
                return null
            }
        },
        startTableLoading: {
            type: Boolean,
            default() {
                return true
            }
        },
        showPagination: {
            type: Boolean,
            default() {
                return true
            }
        },
        dataUrl: {
            type: String,
            required: true
        },
        requestParams: {
            type: Object,
            default() {
                return {}
            }
        }
    },
    created() {
        this.dataUrl && this.loadData()
    },
    components: {
        TablePagination
    },
    data() {
        return {
            tableLoading: false,
            tableData: [],
            pagination: {
                total: 0,
                per_page: 10,
                current_page: 1
            }
        }
    },
    computed: {

    },
    methods: {
        gennerUrl() {
            let url = this.dataUrl
            if (url.indexOf('?') != -1) {
                url += '&page=' + this.pagination.current_page + '&per_page=' + this.pagination.per_page
            } else {
                url += '?page=' + this.pagination.current_page + '&per_page=' + this.pagination.per_page
            }

            //@TODO  merge request params

            return url
        },
        paginationChange(currentPage, size){
            this.pagination.per_page = (0 | size)
            this.pagination.current_page = (0 | currentPage)
            this.loadData()
        },
        loadData() {
            if (this.startTableLoading) {
                this.tableLoading = true
            }
            this.$http.get(this.gennerUrl()).then((res) => {
                if (res && res.status == 200 && res.data.code == 200) {
                    this.pagination.per_page = res.data.data.per_page
                    this.pagination.current_page = res.data.data.current_page
                    this.pagination.total = res.data.data.total
                    this.tableData = res.data.data.data
                } else {
                    this.$message({
                        type: 'error',
                        message: res.data.message || (this.$t('page.error'))
                    })
                }
                this.tableLoading = false
            }, (err) => {
                this.$message({
                    type: 'error',
                    message: res.data.message || (this.$t('page.error'))
                })
                this.tableLoading = false
            })
        }
    }
}
</script>
