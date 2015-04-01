<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0026)http://bm.ikuai8.com/login --> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
    <HEAD>
        <META content="IE=11.0000" http-equiv="X-UA-Compatible">
        <META charset="utf-8">
        <TITLE>货车快跑</TITLE>
        <META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <META name="description" content="货车快跑">
        <META name="viewport" content="width=device-width">
        <LINK href="<?php echo HTTP_RESOURCES . "/";?>css/bootstrap-2.3.2.css" rel="stylesheet">
        <LINK href="<?php echo HTTP_RESOURCES . "/";?>css/flat-ui.css" rel="stylesheet">
        <LINK href="<?php echo HTTP_RESOURCES . "/";?>css/normalize.css" rel="stylesheet">
        <LINK href="<?php echo HTTP_RESOURCES . "/";?>css/main.css" rel="stylesheet">
        <STYLE type="text/css">
            #bgimg {
                position: fixed;
                top: 0px;
                left: 0px;
                z-index: 1;
                width: 100%;
                height: 100%;
                overflow: hidden;
            } #bgimg img {
                position: absolute;
                width: 100%;
                height: 100%;
            } .login, .register, .find-password {
                position: absolute;
                top: 30%;
                left: 30%;
                z-index: 5;
                padding: 30px;
                width: 440px;
                height: auto;
                background-color: rgba(0, 25, 41, 0.6);
                background: transparent\9\0;
            
            
             background:transparent\0;
             * background:transparent;
            
            _background:transparent;
            
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#7000101a,endColorstr=#7000101a);
            
            
             zoom:
                1;
            
            -webkit-border-radius:
                15px;
            
            -moz-border-radius:
                15px;
            
            border-radius:
                15px;
            } .login form, .register form, .find-password form {
                display: block;
                width: 248px;
            } .login input, .register input, .find-password input {
                display: block;
                margin-bottom: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: 10px;
                padding-left: 40px;
                height: 20px;
                line-height: 20px;
                border-style: solid;
                border-width: 1px;
                border-color: #fff;
                background-repeat: no-repeat;
                background-position: 12px 8px;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
            } .login input:-moz-placeholder, .register input:-moz-placeholder, .find-password input:-moz-placeholder {
                color: #515567;
                font-weight: bold;
            } .login input::
            
            -moz-placeholder, .register input::
            
            -moz-placeholder, .find-password input::
            
            -moz-placeholder {
                color: #515567;
                font-weight: bold;
                opacity: 1;
            } .login input:-ms-input-placeholder, .register input:-ms-input-placeholder, .find-password input:-ms-input-placeholder {
                color: #515567;
                font-weight: bold;
            } .login input::
            
            -webkit-input-placeholder, .register input::
            
            -webkit-input-placeholder, .find-password input::
            
            -webkit-input-placeholder {
                color: #515567;
                font-weight: bold;
            } .login input.placeholder, .register input.placeholder, .find-password input.placeholder {
                color: #515567;
                font-weight: bold;
            }
            
            input.error {
                border-color: #ff8900;
                -webkit-box-shadow: 0 0 5px #ff8900;
                -moz-box-shadow: 0 0 5px #ff8900;
                box-shadow: 0 0 5px #ff8900;
            } .login input.verification-code, .register input.verification-code, .find-password input.verification-code {
                width: 90px;
                padding-left: 10px;
            } .verification-code-img {
                display: block;
                margin-left: 10px;
                width: 120px;
                height: 42px;
                text-align: center;
                background-color: #FFF;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
            } .user, .pwd01, .pwd02, .phone, .QQ {
                display: block;
                width: 190px;
                padding-left: 10px;
            } .user {
                background-image: url(<?php echo HTTP_RESOURCES . "/";?>img/ico01.png);
            } .pwd01 {
                background-image: url(<?php echo HTTP_RESOURCES . "/";?>img/ico02.png);
            } .pwd02 {
                background-image: url(<?php echo HTTP_RESOURCES . "/";?>img/ico03.png);
            } .phone {
                background-image: url(<?php echo HTTP_RESOURCES . "/";?>img/ico04.png);
            } .QQ {
                background-image: url(<?php echo HTTP_RESOURCES . "/";?>img/ico05.png);
            } .prompt {
                min-height: 26px;
            } .prompt-error {
                color: #ff8900;
                padding-left: 35px;
                min-height: 30px;
                background: url(<?php echo HTTP_RESOURCES . "/";?>img/ico100.png) no-repeat;
            } .prompt-success {
                color: #27ae60;
                padding-left: 35px;
                min-height: 30px;
                background: url(<?php echo HTTP_RESOURCES . "/";?>img/ico101.png) no-repeat;
            } .prompt-success a {
                text-decoration: underline;
                color: white;
            } .login input.bntH40, .register input.bntH40, .find-password input.bntH40 {
                border: 0px;
                padding: 10px 0;
                width: 248px;
                height: 40px;
                line-height: 20px;
            } .stat {
                width: 100%;
                text-align: center;
            } .stat a {
                color: #FFF;
                font-size: 0.75em;
            } .stat a:hover {
                text-decoration: underline;
            } .verification-code-img img {
                border-radius: 5px;
            } .promptInpt {
                display: block;
                width: 200px;
                height: 0;
                margin: 0 auto;
                position: relative;
            } .promptInpt p {
                display: block;
                width: 180px;
                height: 14px;
                position: absolute;
                color: #858585;
                height: 20px;
                margin-top: 0;
                margin-bottom: 0;
                top: 8px;
                left: 14px;
            }
        </STYLE>
        <META name="GENERATOR" content="MSHTML 11.00.9600.17690">
    </HEAD>
    <BODY>
        <DIV class="clearfix" id="bgimg">
            <IMG src="<?php echo HTTP_RESOURCES . "/";?>img/lo.jpg">
        </DIV><!--登陆-->
        <DIV class="login">
            <IMG class="logo-big fc" src="<?php echo HTTP_RESOURCES . "/";?>img/logobig.png">
            <DIV class="H30">
            </DIV>
            <FORM class="fc" id="login-form">
                <DIV>
                    <DIV class="promptInpt">
                        <P class="promptTxt">
                            手机号/用户名
                        </P>
                    </DIV>
                    <INPUT class="user inptText login-email" type="text">
                </DIV>
                <DIV>
                    <DIV class="promptInpt">
                        <P class="promptTxt">
                            密码
                        </P>
                    </DIV>
                    <INPUT class="pwd01 inptText login-pwd" type="password">
                </DIV>
                <DIV class="H10">
                </DIV>
                <DIV class="prompt" style="display: none;">
                    <DIV class="prompt-error">
                        用户名或密码错误
                    </DIV>
                </DIV>
                <DIV class="H10">
                </DIV>
                <INPUT class="btn-success bntH40" id="btn-login" type="button" value="登　录">
            </FORM>
            <DIV class="stat">
                <A onClick="switching('.login', '.register')" href="javascript: void(0)">注册账号</A>
                &nbsp;&nbsp; <A onClick="switching('.login', '.find-password')" href="javascript: void(0)">找回密码</A>
            </DIV>
        </DIV>
        <!--登陆-end--><!--注册-->
        <DIV class="register" style="display: none;">
            <IMG class="logo-big fc" src="<?php echo HTTP_RESOURCES . "/";?>img/logobig.png">
            <DIV class="H30">
            </DIV>
            <FORM class="fc" id="regist-form">
                <DIV>
                    <DIV class="promptInpt">
                        <P class="promptTxt">
                            手机号
                        </P>
                    </DIV>
                    <INPUT class="user inptText reg-email" type="text">
                </DIV>
                <DIV>
                    <DIV class="promptInpt">
                        <P class="promptTxt">
                            密码
                        </P>
                    </DIV>
                    <INPUT class="pwd01 inptText reg-pwd" type="password">
                </DIV>
                <DIV>
                    <DIV class="promptInpt">
                        <P class="promptTxt">
                            确认密码
                        </P>
                    </DIV>
                    <INPUT class="pwd02 inptText reg-repwd" type="password">
                </DIV>
                <DIV>
                    <DIV class="promptInpt">
                        <P class="promptTxt">
                            用户名
                        </P>
                    </DIV>
                    <INPUT class="phone inptText reg-mobile" type="text">
                </DIV><!-- <div>
                <div class="promptInpt"><p class="promptTxt">邀请码</p></div>
                <input class="inptText reg-invite" name="" type="text" style="padding-left:25px;" />
                </div> -->
                <DIV class="fl">
                    <DIV class="promptInpt" style="width: 60px;">
                        <P class="promptTxt" style="left: -16px; width: 60px;">
                            验证码
                        </P>
                    </DIV>
                    <INPUT class="verification-code inptText reg-code" type="text">
                </DIV><A class="verification-code-img fl" onClick="javascript:$(this).find('img').attr('src', '/Verify/' + Math.random())" href="javascript: void(0)"><IMG src="<?php echo HTTP_RESOURCES . "/";?>img/Verify.png"></A>
                <DIV class="H10">
                </DIV>
                <DIV class="prompt" style="display: none;">
                    <DIV class="prompt-error">
                    </DIV>
                </DIV>
                <DIV class="H10">
                </DIV>
                <INPUT class="btn-success bntH40" id="btn-regist" type="button" value="注　册">
            </FORM>
            <DIV class="stat" style="margin: 0px auto; width: 240px;">
                <INPUT class="fl" id="agree" type="checkbox" checked="checked" value="">
                <LABEL class="fl" style='color: rgb(255, 255, 255); font-family: "微软雅黑"; font-size: 12px;' for="agree">
                    &nbsp;我同意
                </LABEL>
                <A class=" fl" style="color: rgb(0, 136, 204); font-size: 12px; text-decoration: underline; margin-left: 5px;" href="http://bm.ikuai8.com/login/register_protocal" target="_blank">使用协议</A>
                <A class=" fr" style="font-size: 12px;" onClick="switching( '.register','.login')" href="javascript: void(0)">返回登录</A>
            </DIV>
        </DIV>
        <!--注册-end--><!-- 密码找回 -->
        <DIV class="find-password" style="display: none;">
            <IMG class="logo-big fc" src="<?php echo HTTP_RESOURCES . "/";?>img/logobig.png">
            <DIV class="H30">
            </DIV>
            <FORM class="fc" id="find-password-form">
                <DIV>
                    <DIV class="promptInpt">
                        <P class="promptTxt">
                            手机号
                        </P>
                    </DIV>
                    <INPUT class="user inptText find-password-email" type="text">
                </DIV>
                <DIV class="fl">
                    <DIV class="promptInpt" style="width: 60px;">
                        <P class="promptTxt" style="left: -16px; width: 60px;">
                            验证码
                        </P>
                    </DIV>
                    <INPUT class="verification-code inptText find-password-code" type="text">
                </DIV><A class="verification-code-img fl" onClick="javascript:$(this).find('img').attr('src', '/Verify/index/code_id/find_password/' + Math.random())" href="javascript: void(0)"><IMG src="<?php echo HTTP_RESOURCES . "/";?>img/find_password.png"></A>
                <DIV class="H10">
                </DIV>
                <DIV class="prompt" style="display: none;">
                    <DIV class="prompt-error">
                    </DIV>
                    <DIV class="prompt-success">
                    </DIV>
                </DIV>
                <DIV class="H10">
                </DIV>
                <INPUT class="btn-success bntH40" id="btn-find-password" type="button" value="找回密码">
            </FORM>
            <DIV class="stat" style="margin: 0px auto; width: 240px;">
                <A style="font-size: 12px;" onclick="switching( '.find-password','.login')" href="javascript: void(0)">返回登录</A>
            </DIV>
        </DIV>
        <!-- 密码找回-end -->
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/jquery-1.8.3.min.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/bootstrap-2.3.2.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/application.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/bootstrap-select.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/bootstrap-switch.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/flatui-checkbox.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/flatui-radio.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/jquery.tagsinput.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/jquery.placeholder.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/main.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/validate.js">
        </SCRIPT>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/jquery.easing.min.js">
        </SCRIPT>
        <DIV style="display: none;">
            <SCRIPT type="text/javascript">
                var _bdhmProtocol = (("https:" == document.location.protocol) ? "https://" : "http://");
                document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F94c233b083467f29121cf1b55e8e4464' type='text/javascript'%3E%3C/script%3E"));
            </SCRIPT>
        </DIV>
        <SCRIPT src="<?php echo HTTP_RESOURCES . "/";?>js/login.js">
        </SCRIPT>
    </BODY>
</HTML>
