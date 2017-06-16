<template>
    <el-form :inline="true" :model="formModel" class="demo-form-inline" v-if="formItems && formItems.length > 0">
        <template v-for="item in formItems">
            <template v-if="!item.type || (item.type == 'input')">
                <el-form-item :label="item.label">
                    <el-input v-model="formModel[item.name]" :placeholder="item.placeholder"></el-input>
                </el-form-item>
            </template>
            <template v-else-if="item.type == 'select'">
                <el-form-item :label="item.label">
                    <el-select v-model="formModel[item.name]" :placeholder="item.placeholder" clearable>
                        <el-option :label="opt.name" :value="opt.id" v-for="opt in item.data"></el-option>
                    </el-select>
                </el-form-item>
            </template>
        </template>
        <el-form-item>
            <el-button type="primary" @click="onSubmit" :loading="searchBtnLoading">{{ title }}</el-button>
        </el-form-item>
    </el-form>
</template>
<script>
    export default {
        props: {
            formItems: {
                type: Array,
                required: true
            },
            title: {
                type: String,
                default () {
                    return '搜  索'
                }
            }
        },
        data () {
            return {
                searchBtnLoading: false,
                formModel: {
                    category: undefined
                }
            }
        },
        methods: {
            onSubmit () {
                this.$parent.submitForm(this.formModel)
            }
        }
    }
</script>