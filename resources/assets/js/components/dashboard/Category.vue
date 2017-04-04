<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <el-breadcrumb separator="/">
        <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
        <el-breadcrumb-item>活动管理</el-breadcrumb-item>
        <el-breadcrumb-item>活动列表</el-breadcrumb-item>
        <el-breadcrumb-item>活动详情</el-breadcrumb-item>
      </el-breadcrumb>    
  </section>
    <section class="content">
      <div class="row">
        <div class="box">

          <div class="box-body table-responsive">
              <el-table :data="tableData"border style="width: 100%"v-loading.body="tableLoading">
                <el-table-column prop="id" label="ID" sortable> </el-table-column>
                <el-table-column prop="name" label="Name"></el-table-column>
                <el-table-column prop="description" label="Desc"> </el-table-column>
                <el-table-column prop="posts_count" label="posts_count"> </el-table-column>
                <el-table-column prop="comments_count" label="comments_count"> </el-table-column>
                <el-table-column prop="stars_count" label="stars_count"> </el-table-column>
                <el-table-column prop="created_at" label="created_at"> </el-table-column>
                <el-table-column prop="isstart" label="Isstart"
                :filters="[{ text: 'Isstart', value: '1' }, { text: 'Disable', value: '0' }]"
                :filter-method="filterTag"> 
                  <template scope="scope">
                    <el-tag
                      :type="scope.row.isstart === '0' ? 'primary' : 'success'"
                      close-transition>{{scope.row.isstart}}</el-tag>
                  </template>
                </el-table-column>
                <el-table-column inline-template label="操作"  width="160">
                  <template>
                  <el-button type="success" size="small">已处理</el-button>
                  <el-button type="info" size="small">刪除</el-button>
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
      </div>
    </section>

    <el-dialog title="New Category" v-model="dialogFormVisible">
      <el-form :model="formModel" :rules="rules" ref="formModel">
        <el-form-item label="Category Name" :label-width="formLabelWidth" prop="name">
          <el-input v-model="formModel.name" auto-complete="off"></el-input>
        </el-form-item>
        <el-form-item label="Isstart" :label-width="formLabelWidth" prop="isstart">
          <el-select v-model="formModel.isstart" placeholder="Plase choise category status">
            <el-option label="Start" value="1"></el-option>
            <el-option label="Disable" value="0"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="Description" :label-width="formLabelWidth" prop="description">
          <el-input type="textarea" :rows="2" placeholder="Please input category desc" v-model="formModel.description"> </el-input>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible = false">取 消</el-button>
        <el-button type="primary" @click="saveCategory('formModel')" v-loading="butLoading">确 定</el-button>
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
      console.log('===')
      this.reloadData(this.currentPage, this.pageSize);
    },
    methods: {
      formatter(row, column) {
        return row.address;
      },
      filterTag(value, row) {
        return row.isstart === value;
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
