<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <el-breadcrumb separator="/">
        <el-breadcrumb-item :to="{ path: '/' }">{{ $t('category.home') }}</el-breadcrumb-item>
        <el-breadcrumb-item>{{ $t('category.manage') }}</el-breadcrumb-item>
      </el-breadcrumb>
  </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $t('category.manage') }}</h3>
                <div class="box-tools">
                    <el-button type="primary" class="hvr-wobble-to-bottom-right" icon="plus" @click="dialogFormVisible = true" size="small">{{ $t('category.new' )}}</el-button>
                </div>
            </div>
          <div class="box-body table-responsive">
              <el-table :data="tableData"border style="width: 100%"v-loading.body="tableLoading">
                <el-table-column prop="id" label="ID" sortable width="60"> </el-table-column>
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
                <el-table-column inline-template :label="$t('category.optionname')"  width="180">
                  <template>
                      <el-button type="success"  size="small">{{ $t('category.edit')}}</el-button>
                      <el-button type="danger"  size="small" v-if="row.isstart == '1'">{{ $t('category.disable')}}</el-button>
                      <el-button type="info" size="small" v-else>{{ $t('category.undisable')}}</el-button>
                  </template>
                </el-table-column>
              </el-table>
              <div class="box-footer text-center block">
                    <el-pagination
                    @size-change="handleSizeChange"
                    @current-change="handleCurrentChange"
                    :current-page="currentPage"
                    :page-sizes="pageSizes"
                    :page-size="pageSize"
                    layout="total, sizes, prev, pager, next, jumper"
                    :total="total">
                  </el-pagination>
              </div>
          </div>
        </div>
    </section>

    <el-dialog :title="$t('category.new')" v-model="dialogFormVisible" close="resetForm">
      <el-form :model="formModel" :rules="rules" ref="formModel">
        <el-form-item :label="$t('category.new')" :label-width="formLabelWidth" prop="name">
          <el-input v-model="formModel.name" auto-complete="off"></el-input>
        </el-form-item>
        <el-form-item :label="$t('category.isstart')" :label-width="formLabelWidth" prop="isstart">
          <el-select v-model="formModel.isstart" :placeholder="$t('category.placeholder.isstart')">
            <el-option label="YES" value="1"></el-option>
            <el-option label="NO" value="0"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item :label="$t('category.description')" :label-width="formLabelWidth" prop="description">
          <el-input type="textarea" :rows="2" :placeholder="$t('category.placeholder.description')" v-model="formModel.description"> </el-input>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible = false">{{ $t('category.clean') }}</el-button>
        <el-button type="primary" @click="saveCategory('formModel')" v-loading="butLoading">{{ $t('category.save') }}</el-button>
      </div>
    </el-dialog>
  </div>
</template>
<script>
export default {
    data() {
      return {
        dialogFormVisible: false,
        butLoading: false,
        tableLoading: false,
        formLabelWidth:'150px',
        currentPage: 1,
        pageSize: 15,
        pageSizes: [10, 15, 20, 50, 100],
        total: 0,
        formModel: {
          name: '',
          isstart: '',
          description: ''
        },
        rules: {
          name: [
            { required: true, message: 'Please Input Category Name', trigger: 'blur' },
            { min: 3, max: 10, message: '长度在 3 到 10 个字符', trigger: 'blur' }
          ],
          isstart: [
            { required: true, message: 'Please Choise category status', trigger: 'change' }
          ],
          description: [
            { required: true, message: 'Please Input description', trigger: 'blur' }
          ]
        },
        tableData: [],
        api: {
          saveCategory: '/api/category',
          categoryData: '/api/category'
        }
      }
    },
    created(){
      this.reloadData(this.currentPage, this.pageSize);
    },
    methods: {
      formatter(row, column) {
        return row.address;
      },
      filterTag(value, row) {
        let tmp = row.isstart === 1 ? 'YES' : 'NO'
        return tmp === value;
      },
      resetForm() {
        this.$refs['formModel'].resetFields();
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
            _this.$message({
              showClose: true,
              message: res.data.message || 'Save Category Failer',
              type: 'error'
            })
          }
        }, (err) => {
          _this.butLoading = false
          _this.$message({
            showClose: true,
            message: 'Save Category Failer',
            type: 'error'
          })
        })
      }
    }
  }
</script>
