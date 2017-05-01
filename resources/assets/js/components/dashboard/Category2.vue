<template>

<g-table :title="$t('category.manage')" :data-url="dataURL">
    <div slot="breadcrumb-item">
        <el-breadcrumb-item>{{ $t('category.manage') }}</el-breadcrumb-item>
    </div>
    <div slot="tools-add-button">
        <el-button type="primary" class="hvr-wobble-top" icon="plus" @click="dialogFormVisible = true" size="small">{{ $t('category.new' )}}</el-button>
    </div>
    <div slot="g-table-column">

        <el-table-column inline-template :label="$t('category.optionname')"  width="220">
            <template>
                <el-button class="hvr-wobble-top" type="success"  size="small">{{ $t('category.edit')}}</el-button>
                <el-button class="hvr-wobble-top"  type="danger"  size="small" v-if="row.isstart == '1'">{{ $t('category.disable')}}</el-button>
                <el-button class="hvr-wobble-top"  type="info" size="small" v-else>{{ $t('category.undisable')}}</el-button>
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
export default {
    data() {
      return {
        dialogFormVisible: false,
        disableAndActive: false,
        butLoading: false,
        tableLoading: false,
        formLabelWidth:'150px',
        currentPage: 1,
        title: 'new',
        pageSize: 15,
        pageSizes: [10, 15, 20, 50, 100],
        total: 0,
        formModel: {
          id: 0,
          name: '',
          isstart: 0,
          description: ''
        },
        rules: {
          name: [
            { required: true, message: '分类名不能为空', trigger: 'blur' },
            { min: 3, max: 10, message: '长度在 3 到 10 个字符', trigger: 'blur' }
          ],
          description: [
            { required: true, message: '请输入描述信息', trigger: 'blur' }
          ]
        },
        tableData: [],
        dataURL: '/api/category',
        api: {
          saveCategory: '/api/category',
          categoryData: '/api/category',
          categoryAPI: '/api/category',
        }
      }
    },
    methods: {
      filterTag(value, row) {
        let tmp = row.isstart === 1 ? 'YES' : 'NO'
        return tmp === value;
      },
      resetForm() {
        this.formModel.id = 0
        this.formModel.name = ''
        this.formModel.isstart = 0
        this.formModel.description = ''
        this.title = 'new'
        this.dialogFormVisible = false
      },
      handleStatus(row) {
        let _this = this
        _this.$http.post(_this.api.categoryAPI + '/' + row.id).then((res) => {
            if (res && res.data.code === 200) {
                _this.$message({
                    type: 'success',
                    message: 'success'
                })
                _this.reloadData(_this.currentPage, _this.pageSize)
            } else {
                this.$message({
                    type: 'error',
                    message: res.data.message || '修改失败',
                    showClose: true
                })
            }
        }, (err) => {
            this.$message({
                type: 'error',
                message: err,
                showClose: true
            })
        })
      },
      handleDelete(row) {
          let _this = this
          _this.$http.delete(_this.api.categoryAPI + '/' + row.id).then((res) => {
              if (res && res.data.code === 200) {
                  _this.$message({
                      type: 'success',
                      message: 'success'
                  })
                  _this.reloadData(_this.currentPage, _this.pageSize)
              } else {
                  this.$message({
                      type: 'error',
                      message: res.data.message || '删除失败',
                      showClose: true
                  })
              }
          }, (err) => {
              this.$message({
                  type: 'error',
                  message: err,
                  showClose: true
              })
          })
      },
      handleEdit(row){
        this.title = 'editTitle',
        this.formModel.name = row.name
        this.formModel.id = row.id
        this.formModel.isstart = row.isstart
        this.formModel.description = row.description
        this.dialogFormVisible = true
      },
      handleSizeChange(val) {
        this.reloadData(1, val)
      },
      handleCurrentChange(val) {
        this.reloadData(val, this.pageSize)
      },
      reloadData(currentPage, size) {
        console.log('reload')
        let _this = this
        _this.tableLoading = true
        _this.$http.get(_this.api.categoryData + '?limit=' + size + '&page=' + currentPage).then((res) => {
          if (res.status == 200 && res.data.code == 200) {
            _this.tableLoading = false
            _this.tableData = res.data.data.data
            _this.total = res.data.data.total
            _this.pageSize = res.data.data.per_page
            _this.currentPage = res.data.data.current_page
          } else {
            _this.tableLoading = false
          }
        }, (error) => {
          _this.tableLoading = false
        });
      },
      clearForm() {
        this.formModel = {}
      },
      saveCategory(formName) {
        let _this = this;
        _this.$refs[formName].validate((valid) => {
          if (valid) {
            _this.butLoading = true;
            _this._saveCategory(_this.formModel);
          } else {
            return false;
          }
        });
      },
      _saveCategory(data) {
        let _this = this
        _this.$http.post(_this.api.saveCategory, data).then((res) => {
          if (res && res.data.code === 200) {
            _this.dialogFormVisible = false
            _this.butLoading = false
            _this.reloadData()
            _this.clearForm()
          } else {
            _this.butLoading = false
            this.$message({
                type: 'error',
                message: res.data.message || '保存失败',
                showClose: true
            })
          }
        }, (err) => {
          _this.butLoading = false
          this.$message({
              type: 'error',
              message: err,
              showClose: true
          })
        })
      }
    }
  }
</script>
