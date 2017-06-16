<template>
    <el-dialog
        :title="title"
        :visible.sync="dialogVisible"
        :size="size">
        <el-form :model="formModel" :label-position="labelPosition" :rules="rules">
            <el-form-item :prop="formItem.prop" :label="formItem.label || ''" v-for="formItem in formItems" >
                <template v-if="formItem.type == 'select'">
                    <el-select v-model="formModel[formItem.name]" :placeholder="formItem.placeholder">
                        <el-option :label="option.label" :value="option.id" v-for="option in getSelectData(formItem)"></el-option>
                    </el-select>
                </template>
                <template v-else-if="formItem.type == 'switch'">
                    <el-input v-model="formModel[formItem.name]" :placeholder="formItem.placeholder"></el-input>
                </template>
                <template v-else-if="formItem.type == 'textarea'">
                    <el-input v-model="formModel[formItem.name]" :placeholder="formItem.placeholder"></el-input>
                </template>
                <template v-else-if="formItem.type == 'img'">
                    <el-input v-model="formModel[formItem.name]" :placeholder="formItem.placeholder"></el-input>
                </template>
                <template v-else>
                    <el-input v-model="formModel[formItem.name]" :placeholder="formItem.placeholder"></el-input>
                </template>
            </el-form-item>
        </el-form>

        <span slot="footer" class="dialog-footer">
            <el-button @click="dialogVisible = false">{{ cleanName }}</el-button>
            <el-button type="primary" @click="dialogVisible = false">{{ confirmName }}</el-button>
        </span>
    </el-dialog>
</template>

<script>
    export default {
        name: 'FormDialog',
        data () {
            return {
                dialogVisible: false
            }
        },
        props: {
            size: {
                type: String,
                default () {
                    return 'tiny'
                }
            },
            title: {
                type: String,
                default () {
                    return '提 示'
                }
            },
            confirmName: {
                type: String,
                default () {
                    return '确 定'
                }
            },
            cleanName: {
                type: String,
                default () {
                    return '取 消'
                }
            },
            labelPosition: {
                type: String,
                default () {
                    return 'right'//right/left/top
                }
            },
            formItems: {
                type: Array,
                required: true
            }
        },
        methods: {
            async getSelectData (formItem) {
                if (formItem.data && formItem.data.length > 0) {
                    return formItem.data
                } else if (formItem.url) {
                    await this.$http.get(formItem.url).then((res) => {

                    })
                }

                return []
            }

        }
    }
</script>