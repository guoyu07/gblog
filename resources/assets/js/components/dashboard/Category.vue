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
          <div class="box-header">
            <el-row :gutter="20">
              <el-col :span="18">
                <h3 class="box-title">Bordered Table</h3>
              </el-col>
              <el-col :span="6">
                <el-row type="flex" class="row-bg" justify="end">
                  <el-button type="primary" icon="plus" @click="dialogFormVisible = true">New</el-button>
                </el-row>
              </el-col>
            </el-row>
          </div>
          <div class="box-body">
              <el-table
                :data="tableData"
                border
                style="width: 100%">
                <el-table-column
                  prop="date"
                  label="日期"
                  sortable
                  width="180">
                </el-table-column>
                <el-table-column
                  prop="name"
                  label="姓名"
                  width="180">
                </el-table-column>
                <el-table-column
                  prop="address"
                  label="地址"
                  :formatter="formatter">
                </el-table-column>
                <el-table-column
                  prop="tag"
                  label="标签"
                  width="100"
                  :filters="[{ text: '家', value: '家' }, { text: '公司', value: '公司' }]"
                  :filter-method="filterTag">
                  <template scope="scope">
                    <el-tag
                      :type="scope.row.tag === '家' ? 'primary' : 'success'"
                      close-transition>{{scope.row.tag}}</el-tag>
                  </template>
                </el-table-column>
              </el-table>
          </div>
          <div class="box-footer clearfix">
              <el-row type="flex" justify="center">
                  <el-pagination
                  @size-change="handleSizeChange"
                  @current-change="handleCurrentChange"
                  :current-page="currentPage"
                  :page-sizes="[100, 200, 300, 400]"
                  :page-size="100"
                  layout="total, sizes, prev, pager, next, jumper"
                  :total="400">
                </el-pagination>
              </el-row>
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
        formLabelWidth:'150px',
        currentPage: 150,
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
          saveCategory: '/api/category'
        }
      }
    },
    methods: {
      formatter(row, column) {
        return row.address;
      },
      filterTag(value, row) {
        return row.tag === value;
      },
      handleSizeChange(val) {
      },
      handleCurrentChange(val) {
      },
      reloadData(currentPage, size) {

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
