<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta name="apple-mobile-web-app-title" content="简书">
  <title>登录 - 简书</title>
  <link rel="stylesheet" media="all" href="http://cdn-qn0.jianshu.io/assets/web-155134ea9e93f1adb151.css" />
  <link rel="stylesheet" media="all" href="http://cdn-qn0.jianshu.io/assets/web/pages/common/signin/entry-155134ea9e93f1adb151.css" />
</head>

<body class="no-padding reader-black-font" lang="zh-CN">
  <div class="sign">
    <div class="main">
        <h4 class="title">
          <div class="normal-title">
            <a class="active" href="/sign_in">登录</a>
          </div>
        </h4>
<div class="js-sign-in-container">
  <form id="new_session" action="/sessions" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="XjRHJdyRuGqWoOZs3ePW3lZGWAAuA+klbtPf9hqz4Iq/ES6T4p7AuWXnTpHLQBmKGuvn3G6GoTPikDAmIFgJSw==" />
    <div class="input-prepend restyle js-normal ">
      <input placeholder="手机号或邮箱" type="text" name="session[email_or_mobile_number]" id="session_email_or_mobile_number" />
      <i class="iconfont ic-user"></i>
    </div>
    <div class="input-prepend">
      <input placeholder="密码" type="password" name="session[password]" id="session_password" />
      <i class="iconfont ic-password"></i>
    </div>
    <div class="js-geetest-captcha"></div>
    <div class="remember-btn">
      <input type="checkbox" value="true" checked="checked" name="session[remember_me]" id="session_remember_me" /><span>记住我</span>
    </div>
    <input type="submit" name="commit" value="登录" class="sign-in-button" />
</form>
  <!-- 手机验证码登录modal -->

  <!-- 更多登录方式 -->
  <div class="more-sign">
    <h6>社交帐号登录</h6>
    <ul>
  <li><a class="weibo" href="/users/auth/weibo"><i class="iconfont ic-weibo"></i></a></li>
  <li><a class="weixin" href="/users/auth/wechat"><i class="iconfont ic-wechat"></i></a></li>
  <li><a class="qq" href="/users/auth/qq_connect"><i class="iconfont ic-qq_connect"></i></a></li>
    <li class="js-more-method"><a href="javascript:void(0);"><i class="iconfont ic-more"></i></a></li>
    <li class="js-hide-method hide"><a class="douban" href="/users/auth/douban"><i class="iconfont ic-douban"></i></a></li>
</ul>
</body>
</html>
