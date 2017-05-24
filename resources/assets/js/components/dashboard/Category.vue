<template>
	<div>
		<breadcrumb :breadcrumbs="breadcrumbs" :name="'你好啊'"></breadcrumb>

        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>wode 分类管理</h5>
                        <div class="ibox-tools">
                            <el-button type="primary" size="small">主要按钮</el-button>
                            <el-button type="primary" size="small">主要按钮</el-button>
                            <el-button type="primary" size="small">主要按钮</el-button>
                        </div>
                    </div>
                    <div class="ibox-content">
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
      :filter-method="filterTag"
      filter-placement="bottom-end">
      <template scope="scope">
        <el-tag
          :type="scope.row.tag === '家' ? 'primary' : 'success'"
          close-transition>{{scope.row.tag}}</el-tag>
      </template>
    </el-table-column>
  </el-table>
  <div class="box-footer text-center block" style="margin-top: 20px;">
  <el-pagination
      @size-change="handleSizeChange"
      @current-change="handleCurrentChange"
      :current-page="currentPage4"
      :page-sizes="[100, 200, 300, 400]"
      :page-size="100"
      layout="total, sizes, prev, pager, next, jumper"
      :total="400">
    </el-pagination></div>
                    </div>
                    
                </div>
            </div>
        </div>
	</div>
    </div>
</template>

<script>
    import Breadcrumb from './particals/Breadcrumb.vue'
	export default {
		components: {
            Breadcrumb
        },
        data() {
      return {
        currentPage1: 5,
        currentPage2: 5,
        currentPage3: 5,
        currentPage4: 4,
        breadcrumbs: [
                    {
                        to: 'wocao',
                        name: '分类管理'
                    }
                ],
        tableData: [{
          date: '2016-05-02',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄',
          tag: '家'
        }, {
          date: '2016-05-04',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1517 弄',
          tag: '公司'
        }, {
          date: '2016-05-01',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1519 弄',
          tag: '家'
        }, {
          date: '2016-05-03',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1516 弄',
          tag: '公司'
        }]
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
        console.log(`每页 ${val} 条`);
      },
      handleCurrentChange(val) {
        console.log(`当前页: ${val}`);
      }
    }
	}
</script>