<!--
 *_______________#########_______________________
 *______________############_____________________
 *______________#############____________________
 *_____________##__###########___________________
 *____________###__######_#####__________________
 *____________###_#######___####_________________
 *___________###__##########_####________________
 *__________####__###########_####_______________
 *________#####___###########__#####_____________
 *_______######___###_########___#####___________
 *_______#####___###___########___######_________
 *______######___###__###########___######_______
 *_____######___####_##############__######______
 *____#######__#####################_#######_____
 *____#######__##############################____
 *___#######__######_#################_#######___
 *___#######__######_######_#########___######___
 *___#######____##__######___######_____######___
 *___#######________######____#####_____#####____
 *____######________#####_____#####_____####_____
 *_____#####________####______#####_____###______
 *______#####______;###________###______#________
 *________##_______####________####______________
 * 公主殿下 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="keywords" content="萌音云笔记,在线笔记,笔记文档,云笔记,萌音云" />
    <meta name="description" content="萌音云笔记，一个高效的在线云笔记、专注技术文档在线创作、阅读、分享和托管" />
    <meta name="author" content="阿珏博客">
    <meta name="generator" content="萌音云笔记">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/css/mdui.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.contextMenu.css')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    @yield('link')
</head>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar  mdui-theme-primary-indigo mdui-theme-accent-pink">
<header class="mdui-appbar mdui-appbar-fixed">
  <div class="mdui-toolbar mdui-color-theme" style="background-color: #398DEE!important;">
    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
    <a href="/" class="mdui-typo-headline mdui-hidden-xs">萌音云笔记</a>
    <a href="{{url('web')}}" class="mdui-typo-title mdui-hidden-xs-down">广场</a>
    <div class="mdui-toolbar-spacer"></div>
    @if (!session('user'))
    <div class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" id="mc-login" mdui-tooltip="{content: '登录'}"><i class="mdui-icon material-icons">account_circle</i></div>
    @else
    <img src="{{asset('images/'.session('user.photo'))}}" style="height:30px;cursor:pointer" id="photo" mdui-menu="{target: '#appbar-user-popover'}">
    <div class="mdui-menu mdui-menu-cascade" id="appbar-user-popover" style="padding: 0px;">
        <div style="margin-top:20px;">
            <img src="{{asset('images/'.session('user.photo'))}}" width="96" height="96" style="float: left;margin:0 10px 20px 15px;">
            <div style="float: left; margin-left: 20px;line-height: 20px;">
                <b style="font-size: 18px;">{{session('user.username','未设置昵称')}}</b>
                <p>{{session('user.email')}}</p>
                <a class="mdui-btn mdui-btn-dense mdui-btn-raised mdui-ripple mdui-color-blue mdui-text-color-white personal" href="{{url('/users',session('user.id'))}}">个人资料</a>
            </div>
        </div>
        <div class="bottom" style="clear: both;border-top: 1px solid #ccc;border-color: rgba(0,0,0,.2);background-color: #f5f5f5; padding: 10px 20px;height: 35px;">
            <a class="mdui-btn mdui-btn-dense mdui-btn-raised mdui-ripple mdui-ripple-black mdui-color-white mdui-float-right" href="{{url('/logout')}}">退出</a>
        </div>
    </div>
    @endif
    <span><a href="https://note.52ecy.cn" class="mdui-list-item mdui-ripple ">官网</a></span>
    <span>会员</span>
    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-dialog="{target: '#dialog-docs-theme'}" mdui-tooltip="{content: '设置主题'}"><i class="mdui-icon material-icons">color_lens</i></span>
    <a href="https://github.com/178146582/note" target="_blank" class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-tooltip="{content: '查看 Github'}">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 36" enable-background="new 0 0 36 36" xml:space="preserve" class="mdui-icon" style="width: 24px;height:24px;">
        <path fill-rule="evenodd" clip-rule="evenodd" fill="#ffffff" d="M18,1.4C9,1.4,1.7,8.7,1.7,17.7c0,7.2,4.7,13.3,11.1,15.5
	c0.8,0.1,1.1-0.4,1.1-0.8c0-0.4,0-1.4,0-2.8c-4.5,1-5.5-2.2-5.5-2.2c-0.7-1.9-1.8-2.4-1.8-2.4c-1.5-1,0.1-1,0.1-1
	c1.6,0.1,2.5,1.7,2.5,1.7c1.5,2.5,3.8,1.8,4.7,1.4c0.1-1.1,0.6-1.8,1-2.2c-3.6-0.4-7.4-1.8-7.4-8.1c0-1.8,0.6-3.2,1.7-4.4
	c-0.2-0.4-0.7-2.1,0.2-4.3c0,0,1.4-0.4,4.5,1.7c1.3-0.4,2.7-0.5,4.1-0.5c1.4,0,2.8,0.2,4.1,0.5c3.1-2.1,4.5-1.7,4.5-1.7
	c0.9,2.2,0.3,3.9,0.2,4.3c1,1.1,1.7,2.6,1.7,4.4c0,6.3-3.8,7.6-7.4,8c0.6,0.5,1.1,1.5,1.1,3c0,2.2,0,3.9,0,4.5
	c0,0.4,0.3,0.9,1.1,0.8c6.5-2.2,11.1-8.3,11.1-15.5C34.3,8.7,27,1.4,18,1.4z"></path>
      </svg>
    </a>
  </div>
</header>
<div class="mdui-drawer" id="main-drawer">
  <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">

    @if (isset($FolderInfo))
    <div class="mdui-collapse-item ">
      <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">near_me</i>
        <div class="mdui-list-item-content">新建笔记</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
      </div>
      <div class="mdui-collapse-item-body mdui-list">
        <a href="{{url('note')}}" class="mdui-list-item mdui-ripple ">新建笔记</a>
        <a href="{{url('markdown')}}" class="mdui-list-item mdui-ripple ">新建Markdown笔记</a>
      </div>
    </div>
    <div class="mdui-collapse-item ">
      <div class="mdui-collapse-item-header mdui-list-item mdui-ripple" id="folder">
        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-deep-orange">layers</i>
        <div class="mdui-list-item-content">我的文件夹</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
      </div>
      <div class="mdui-collapse-item-body mdui-list">
        <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
        
        @foreach ($FolderInfo as $v)
            <div class="mdui-collapse-item">
              <div class="mdui-collapse-item-header mdui-list-item mdui-ripple myfolder" data-fid="{{$v->id}}">
                <i class="mdui-icon material-icons mdui-text-color-yellow-700">create_new_folder</i>
                <div class="mdui-list-item-content" style="margin-left: 10px;">{{$v->name}}</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
              </div>
              <div class="mdui-collapse-item-body mdui-list">
                @foreach ($v->contents as $w)
                <a href="{{url($w->type==1?'note':'markdown',$w->id)}}" class="mdui-list-item mdui-ripple mynote" style="margin-left: 32px;" data-cid="{{$w->id}}">{{$w->title}}</a>
                @endforeach
              </div>
            </div>
        @endforeach
        
        </div>
      </div>
    </div>
    @else
    <div class="mdui-collapse-item">
      <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">check_circle</i>
        <div class="mdui-list-item-content">登录后即可查阅</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
      </div>
    </div>
    @endif

  </div>
</div>
<div class="mdui-container-fluid">

@yield('content')

</div>

@if (!session('user'))

@include('layouts.login')

@else
<div class="mdui-dialog mdui-dialog-prompt mdui-dialog-open" id="move">
	<div class="mdui-dialog-content">
        <select class="mdui-select">
        @foreach ($FolderInfo as $v)
        <option value="{{$v->id}}">{{$v->name}}</option>
        @endforeach
        </select>
	</div>
	<div class="mdui-dialog-actions ">
		<a href="javascript:void(0)" class="mdui-btn mdui-ripple mdui-text-color-primary " mdui-dialog-close>取消</a>
		<a href="javascript:void(0)" class="mdui-btn mdui-ripple mdui-text-color-primary " id="foldermove">移动</a>
	</div>
</div>
@endif

@include('layouts.theme')


<script src="https://lib.baomitu.com/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/js/mdui.min.js"></script>
<script src="{{asset('js/jquery.contextMenu.min.js')}}"></script>
<script type="text/javascript">
$(function(){


@if (!session('user'))
    $('#mc-login').click(function(){
        $('.mc-login').show()
        $('.mdui-overlay').show()
    })
    $('.close').click(function(){
        $(this).parent('div').hide()
        $('.mdui-overlay').hide()
    })
    // 忘记密码
    $('.mc-password-reset-trigger').click(function(){
        $('.mc-login').hide()
        $('.mc-register').hide()
        $('.mc-reset').show()
    })
    // 注册新账号
    $('.mc-register-trigger').click(function(){
        $('.mc-login').hide()
        $('.mc-reset').hide()
        $('.mc-register').show()
    })
    // 已有账号
    $('.mc-login-trigger').click(function(){
        $('.mc-reset').hide()
        $('.mc-register').hide()
        $('.mc-login').show()
    })

    $('#login').click(function(){
        if ($('#name').val()=='' || $('#password').val()=='') return
        $.post('{{url('login')}}',{
            name: $('#name').val(),
            password: $('#password').val(),
            _token: '{{ csrf_token() }}'
        },function(res){
            if (res.code!=0) {
                mdui.snackbar({
                  message: res.msg
                });
                return
            }
            // $('.close').click()
            location.reload()
        })
    })

    $('#reset_send').click(function(){
        if($('#reset_email').val()=='')return
        $('#reset_send').html("重新发送(60)");
        $('#reset_send').attr('disabled',true);
        var myVar = setInterval(function() { 
            if (countdown == 0) { 
                $('#reset_send').attr('disabled',false); 
                $('#reset_send').html("获取验证码");
                countdown = 59; 
                clearInterval(myVar)
            } else { 
                $('#reset_send').html("重新发送(" + countdown + ")");
                countdown--; 
            }
        },1000)
        $.post('{{url('reset_send')}}',{
            email: $('#reset_email').val(),
            _token: '{{ csrf_token() }}'
        },function(res){
            if (res.code!=0) {
                mdui.snackbar({
                  message: res.msg
                });
                countdown=0
                return
            }
        })
    })
    var countdown=59; 
    $('#send').click(function(){
        if($('#email').val()=='')return
        $('#send').html("重新发送(60)");
        $('#send').attr('disabled',true);
        var myVar = setInterval(function() { 
            if (countdown == 0) { 
                $('#send').attr('disabled',false); 
                $('#send').html("获取验证码");
                countdown = 59; 
                clearInterval(myVar)
            } else { 
                $('#send').html("重新发送(" + countdown + ")");
                countdown--; 
            }
        },1000)
        $.post('{{url('send')}}',{
            email: $('#email').val(),
            _token: '{{ csrf_token() }}'
        },function(res){
            if (res.code!=0) {
                mdui.snackbar({
                  message: res.msg
                });
                countdown=0
                return
            }
        })
    })

    $('#reg').click(function(){
        $.post('{{url('reg')}}',{
            email: $('#email').val(),
            code: $('#email_code').val(),
            _token: '{{ csrf_token() }}'
        },function(res){
            if (res.code==0) {
                alert(res.msg)
            }else{
                mdui.snackbar({
                  message: res.msg
                });
            }
        })
    })

    $('#reset').click(function(){
        $.post('{{url('reset')}}',{
            email: $('#reset_email').val(),
            code: $('#reset_email_code').val(),
            _token: '{{ csrf_token() }}'
        },function(res){
            if (res.code==0) {
                alert(res.msg)
            }else{
                mdui.snackbar({
                  message: res.msg
                });
            }
        })
    })
@else

    var fid = 0,cid=0;
    $('.myfolder').mousedown(function(e){ 
        fid = $(this).data('fid')
    })
    $('.mynote').mousedown(function(){
        cid = $(this).data('cid')
    })
    
    $("#folder").contextMenu({
		menu: [{
				text: '<i class="fa fa-plus"></i> 新建',
				callback: function() {
					mdui.prompt('请输入新建文件名',
                        function (value) {
                            $.post('{{url('api/newly')}}',{
                                name:value,
                                _token: '{{ csrf_token() }}'
                            },function(){
                                location.reload()
                            })
                        }
                    );
				}
			}
		]
    });
    
    $(".myfolder").contextMenu({
		menu: [{
				text: '<i class="fa fa-files-o"></i> 重命名',
				callback: function() {
					mdui.prompt('请输入新的文件名',
                        function (value) {
                            $.post('{{url('api/rename')}}',{
                                id:fid,
                                name:value,
                                _token: '{{ csrf_token() }}'
                            },function(){
                                location.reload()
                            })
                        }
                    );
				}
			},
			{
				text: '<i class="fa fa-trash"></i> 删除',
				callback: function() {
                    mdui.dialog({
                        content: '要删除现有文件夹吗？',
                        buttons: [{text: '取消'},{
                            text: '确认',
                            onClick: function(inst){
                                $.post('{{url('api/del')}}',{
                                    id:fid,
                                    _token: '{{ csrf_token() }}'
                                },function(res){
                                    if(res.code=='1'){
                                        mdui.snackbar({
                                            message: res.msg
                                        });
                                        return
                                    }
                                    location.reload()
                                })
                                }
                            }
                        ]
                    });
				}
			}
		]
    });
    
    $(".mynote").contextMenu({
		menu: [{
				text: '<i class="fa fa-trash"></i> 删除',
				callback: function() {
					mdui.dialog({
                        title: '要删除现有笔记吗？',
                        buttons: [{text: '取消'},{
                            text: '确认',
                            onClick: function(inst){
                                $.post('{{url('api/delete')}}',{
                                    id:cid,
                                    _token: '{{ csrf_token() }}'
                                },function(){
                                    location.reload()
                                })
                                }
                            }
                        ]
                    });
				}
            },
            {
				text: '<i class="mdui-icon material-icons">leak_remove</i> 移动',
				callback: function() {
                    new mdui.Dialog('#move').open();
				}
			}
		]
    });
    
    $('#foldermove').click(function(){
        $.post('{{url('api/move')}}',{
            cid: cid,
            id: $('select').val(),
            _token: '{{ csrf_token() }}'
        },function(){
            location.reload()
        })
    })
@endif
})

</script>
@yield('js')
</body>
</html>




