<template>
<div class="sign">
  <div class="main">
      <h4 class="title">
        <div class="normal-title">
          登录
        </div>
      </h4>
    <div class="js-sign-in-container">
        <div class="input-prepend restyle js-normal ">
            <el-form :model="submitModel" :rules="rules" ref="submitModel" label-width="100px" class="demo-ruleForm">
                <el-form-item  prop="username" label-width="0">
                    <el-input type="password" v-model="submitModel.username" auto-complete="off" size="large"></el-input>
                </el-form-item>
                <el-form-item  prop="password"  label-width="0">
                    <el-input type="password" v-model="submitModel.password" auto-complete="off" size="large"></el-input>
                </el-form-item>
                <el-form-item prop="remember"  label-width="0" class="remember-btn">
                    <el-checkbox label="记住我i" name="remember"></el-checkbox>
                </el-form-item>
                <el-form-item label-width="0">
                    <el-button size="sign-in-button" type="primary" @click="submitForm('submitModel')" class="sign-in-button">提交</el-button>
                </el-form-item>
            </el-form>
        </div>
     </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
      return {
        loginUrl: '/api/login',
        submitModel: {
          username: '',
          password: '',
          remember: '',
        },
        rules: {
          username: [
            { required: true, message: '请输入用户名', trigger: 'blur' },
            { min: 3, max: 5, message: '长度在 3 到 5 个字符', trigger: 'blur' }
          ],
          password: [
            { required: true, message: '请输入密码', trigger: 'blur' },
            { min: 6, max: 15, message: '长度在 6 到 15 个字符', trigger: 'blur' }
          ]
        }
      }
    },
    methods: {
      submitForm(data) {
          let _this = this;
          _this.$refs[data].validate((valid) => {
            if (valid) {
              _this.doSubmit(data);
            } else {
              return false;
            }
          });
      },
      doSubmit(data){
        let _this = this;
        _this.$http.post(_this.loginUrl, data).then((res) => {
            location.href = '/'
        }, response => {
            _this.$notify.error({
              title: '登陆失败',
              message: '登陆失败，请稍候再试！！'
            });
        });
      },
    }
}
</script>
<style>
body {
    padding: 0;
    margin: 0;
    height: 100%;
}
.sign {
    height: 100%;
    min-height: 750px;
    text-align: center;
    font-size: 14px;
    background-color: #f1f1f1
}

.sign:before {
    content: "";
    display: inline-block;
    height: 85%;
    vertical-align: middle
}

.sign .disable,.sign .disable-gray {
    opacity: .5;
    pointer-events: none
}

.sign .disable-gray {
background-color: #969696
}

.sign .tooltip-error {
font-size: 14px;
line-height: 25px;
white-space: nowrap;
background: none
}

.sign .tooltip-error .tooltip-inner {
max-width: 280px;
color: #333;
border: 1px solid #ea6f5a;
background-color: #fff
}

.sign .tooltip-error .tooltip-inner i {
position: static;
margin-right: 5px;
font-size: 20px;
color: #ea6f5a;
vertical-align: middle
}

.sign .tooltip-error .tooltip-inner span {
vertical-align: middle;
display: inline-block;
white-space: normal;
max-width: 230px
}

.sign .tooltip-error.right .tooltip-arrow-border {
border-right-color: #ea6f5a
}

.sign .tooltip-error.right .tooltip-arrow-bg {
left: 2px;
border-right-color: #fff
}

.sign .slide-error {
position: relative;
padding: 10px 0;
border: 1px solid #c8c8c8;
border-radius: 4px
}

.sign .slide-error i {
position: static!important;
margin-right: 10px;
color: #ea6f5a!important;
vertical-align: middle
}

.sign .slide-error span {
font-size: 15px;
vertical-align: middle
}

.sign .slide-error div {
margin-top: 10px;
font-size: 13px
}

.sign .slide-error a {
color: #3194d0
}

.sign .js-sign-up-container .slide-error {
border-bottom: none;
border-radius: 0
}

.sign .logo {
position: absolute;
top: 56px;
margin-left: 50px
}

.sign .logo img {
width: 100px
}

.sign .main {
width: 400px;
margin: 60px auto 0;
padding: 50px 50px 30px;
background-color: #fff;
border-radius: 4px;
box-shadow: 0 0 8px rgba(0,0,0,.1);
vertical-align: middle;
display: inline-block
}

.sign .reset-title,.sign .title {
margin: 0 auto 50px;
padding: 10px;
font-weight: 400;
color: #969696
}

.sign .reset-title a,.sign .title a {
padding: 10px;
color: #969696
}

.sign .reset-title a:hover,.sign .title a:hover {
border-bottom: 2px solid #ea6f5a
}

.sign .reset-title .active,.sign .title .active {
font-weight: 700;
color: #ea6f5a;
border-bottom: 2px solid #ea6f5a
}

.sign .reset-title b,.sign .title b {
padding: 10px
}

.sign .reset-title {
color: #333;
font-weight: 700
}

.sign form {
margin-bottom: 30px
}

.sign form .input-prepend {
position: relative;
width: 100%;
margin-bottom: 20px
}

.sign form .input-prepend input {
width: 100%;
height: 50px;
margin-bottom: 0;
border: 1px solid #c8c8c8;
border-radius: 0 0 4px 4px;
background-color: hsla(0,0%,71%,.1);
vertical-align: middle
}

.sign form .input-prepend i {
position: absolute;
top: 14px;
left: 10px;
font-size: 18px;
color: #969696
}

.sign form .input-prepend span {
color: #333
}

.sign form .input-prepend .ic-show {
top: 18px;
left: auto;
right: 8px;
font-size: 12px
}

.sign form .restyle {
margin-bottom: 0
}

.sign form .restyle input {
border-bottom: none;
border-radius: 4px 4px 0 0
}

.sign form .no-radius input {
border-radius: 0
}

.sign form .slide-security-placeholder {
height: 32px;
background-color: hsla(0,0%,71%,.1);
border-radius: 4px
}

.sign form .slide-security-placeholder p {
padding-top: 7px;
color: #999;
margin-right: -7px
}

.sign .overseas-btn {
font-size: 14px;
color: #999
}

.sign .overseas-btn:hover {
color: #2f2f2f
}

.sign .remember-btn {
float: left;
}

.sign .remember-btn span {
margin-left: 5px;
font-size: 15px;
color: #969696;
vertical-align: middle
}

.sign .forget-btn {
float: right;
position: relative;
margin: 15px 0;
font-size: 14px
}

.sign .forget-btn a {
color: #999
}

.sign .forget-btn a:hover {
color: #333
}

.sign .forget-btn .dropdown-menu {
top: 20px;
left: auto;
right: 0;
border-radius: 4px
}

.sign .forget-btn .dropdown-menu a {
padding: 10px 20px;
color: #333
}

.sign .sign-in-button,.sign .sign-up-button {
width: 100%;
padding: 9px 18px;
font-size: 18px;
border: none;
border-radius: 4px;
color: #fff;
background: #42c02e;
cursor: pointer;
outline: none;
display: block;
clear: both
}

.sign .sign-in-button:hover,.sign .sign-up-button:hover {
background: #3db922
}

.sign .sign-in-button {
background: #3194d0
}

.sign .sign-in-button:hover {
background: #187cb7
}

.sign .btn-in-resend,.sign .btn-up-resend {
position: absolute;
top: 7px;
right: 7px;
width: 100px;
height: 36px;
font-size: 13px;
color: #fff;
background-color: #42c02e;
border-radius: 4px;
line-height: 36px
}

.sign .btn-in-resend {
background-color: #3194d0
}

.sign .sign-up-msg {
margin: 10px 0;
padding: 0;
text-align: center;
font-size: 12px;
line-height: 20px;
color: #969696
}

.sign .sign-up-msg a,.sign .sign-up-msg a:hover {
color: #3194d0
}

.sign .overseas input {
padding-left: 110px!important
}

.sign .overseas .overseas-number {
position: absolute;
top: 0;
left: 0;
width: 100px;
height: 50px;
font-size: 18px;
color: #969696;
border-right: 1px solid #c8c8c8
}

.sign .overseas .overseas-number span {
margin-top: 17px;
padding-left: 35px;
text-align: left;
font-size: 14px;
display: block
}

.sign .overseas .dropdown-menu {
width: 100%;
max-height: 285px;
font-size: 14px;
border-radius: 0 0 4px 4px;
overflow-y: auto
}

.sign .overseas .dropdown-menu li .nation-code {
width: 65px;
display: inline-block
}

.sign .overseas .dropdown-menu li a {
padding: 6px 20px;
font-size: 14px;
line-height: 20px
}

.sign .overseas .dropdown-menu li a::hover {
color: #fff;
background-color: #f5f5f5
}

</style>
