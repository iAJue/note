<!-- 模板 -->
<div class="mc-login mdui-dialog mdui-dialog-open" style="top: 201.5px; display: none; height: 540px;">
    <button class="mdui-btn mdui-btn-icon mdui-text-color-white close"><i class="mdui-icon material-icons">close</i></button>
    <div class="mdui-dialog-title mdui-color-indigo">
        登录
    </div>
    <form>
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom">
            <label class="mdui-textfield-label">用户名或邮箱</label>
            <input class="mdui-textfield-input" id="name" type="text" required="" autofocus="autofocus" >
            <div class="mdui-textfield-error">账号不能为空</div>
        </div>
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom">
            <label class="mdui-textfield-label">密码</label>
            <input class="mdui-textfield-input" id="password" type="password" required="">
            <div class="mdui-textfield-error">密码不能为空</div>
        </div>
        <div class="actions mdui-clearfix">
            <button class="mdui-btn mdui-ripple more-option" type="button" mdui-menu="{target: '#mc-login-menu', position: 'top', covered: true}">更多选项</button>
            <ul class="mdui-menu" id="mc-login-menu">
                <li class="mdui-menu-item"><a class="mdui-ripple mc-password-reset-trigger">忘记密码</a></li>
                <li class="mdui-menu-item"><a class="mdui-ripple mc-register-trigger">创建新账号</a></li>
            </ul>
            <button type="button" class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right" id="login">登录</button>
        </div>
    </form>
</div>
<div class="mc-reset mdui-dialog mdui-dialog-open" style="top: 201.5px; display: none; height: 540px;">
    <button class="mdui-btn mdui-btn-icon mdui-text-color-white close"><i class="mdui-icon material-icons">close</i></button>
    <div class="mdui-dialog-title mdui-color-deep-orange mdui-text-color-white">
        重置密码
    </div>
    <form class="">
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom">
            <label class="mdui-textfield-label">邮箱</label><input class="mdui-textfield-input" id="reset_email" type="email" required="">
            <div class="mdui-textfield-error">
                邮箱格式错误
            </div>
        </div>
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom send-email-field">
            <label class="mdui-textfield-label">邮件验证码</label><input class="mdui-textfield-input" id="reset_email_code" type="text" required="">
            <div class="mdui-textfield-error">
                验证码不能为空
            </div>
            <button class="mdui-btn send-email" type="button" id="reset_send">发送验证码</button>
        </div>
        <div class="actions">
            <button type="button" class="mdui-btn mdui-ripple more-option" mdui-menu="{target: '#mc-password-reset-menu', position: 'top', covered: true}">更多选项</button>
            <ul class="mdui-menu" id="mc-password-reset-menu">
                <li class="mdui-menu-item"><a class="mdui-ripple mc-login-trigger">登录账号</a></li>
                <li class="mdui-menu-item"><a class="mdui-ripple mc-register-trigger">创建新账号</a></li>
            </ul>
            <button type="button" class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right" id="reset">重置密码</button>
        </div>
    </form>
</div>

<div class="mc-register mdui-dialog mdui-dialog-open" style="top: 201.5px; display: none; height: 540px;">
    <button class="mdui-btn mdui-btn-icon mdui-text-color-white close"><i class="mdui-icon material-icons">close</i></button>
    <div class="mdui-dialog-title mdui-color-green mdui-text-color-white">
        创建新账号
    </div>
    <form class="">
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom">
            <label class="mdui-textfield-label">邮箱</label><input class="mdui-textfield-input" id="email" type="email" required="">
            <div class="mdui-textfield-error">
                邮箱格式错误
            </div>
        </div>
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom send-email-field">
            <labe class="mdui-textfield-label">邮件验证码</labe><input class="mdui-textfield-input" id="email_code" type="text" required="">
            <div class="mdui-textfield-error">
                验证码不能为空
            </div>
            <button class="mdui-btn send-email" type="button" id="send">发送验证码</button>
        </div>
        <div class="actions">
            <div class="mdui-btn mdui-ripple more-option mc-login-trigger">
                已有账号？
            </div>
            <button type="button" class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right" id="reg">立即注册</button>
        </div>
    </form>
</div>
<div class="mdui-overlay mdui-overlay-show" style="display: none;z-index: 5100;"></div>