@extends('layouts.app')

@section('title', '用户中心 - 萌音云笔记')


@section('content')

<div id="page-user" class="mdui-container">
	<div class="mdui-card cover" style="background-image: url({{asset('images/'. ($info['cover']!=''?$info['cover']:'default_l.webp') )}});">
		@if(session('user.id')==$id)
		<div class="mc-cover-upload">
			<button class="mdui-btn mdui-btn-icon mdui-ripple upload-btn" type="button" title="点击上传封面">
				<i class="mdui-icon material-icons">photo_camera</i>
			</button>
			<input type="file" id="upload_file" accept="image/jpeg,image/png">
		</div>
		@endif
		<div class="gradient mdui-card-media-covered mdui-card-media-covered-gradient">
		</div>
		<div class="info">
			<div class="avatar-box">
				@if(session('user.id')==$id)
				<div class="mc-avatar-upload">
					<button class="mdui-btn mdui-btn-icon mdui-ripple upload-btn" type="button" title="点击上传头像">
						<i class="mdui-icon material-icons">photo_camera</i>
					</button>
					<input type="file" id="upload_avatar" accept="image/jpeg,image/png">
				</div>
				@endif
				<img src="{{asset('images/'. ($info['photo']!=''?$info['photo']:'timg.jpg') )}}" class="avatar">
			</div>
			<div class="username">
				{{$info['username']!=''?$info['username']:'未设置昵称'}}
			</div>
			<div class="meta">
				{{$info['sign']!=''?$info['sign']:'这家伙很懒，什么都没有写'}}
			</div>
			@if(session('user.id')==$id)
			<div class="menu mdui-float-right" style="right: 15px;bottom: 15px;">
				<button class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white mdui-text-color-white" mdui-menu="{target: '#user-menu-menu', position: 'top', align: 'right'}"><i class="mdui-icon material-icons">more_vert</i></button>
				<ul class="mdui-menu" id="user-menu-menu">
					<li class="mdui-menu-item"><a id="del" class="mdui-ripple">删除背景</a></li>
					<li class="mdui-menu-item"><a class="mdui-ripple" mdui-dialog="{target: '#info'}">修改个人资料</a></li>
				</ul>
			</div>
			@endif
		</div>
	</div>
	
</div>
@if(session('user.id')==$id)
<div class="mdui-dialog mdui-dialog-prompt mdui-dialog-open" id="info">
	<div class="mdui-dialog-content">
		<div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">昵称</label>
            <input class="mdui-textfield-input" type="text" id="name" maxlength="6" autofocus="autofocus" value="{{$info['username']}}">
        </div>
		<div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">密码（不修改则留空）</label>
            <input class="mdui-textfield-input" type="password" id="password" maxlength="10">
        </div>
		<div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">一句话介绍你自己</label>
            <input class="mdui-textfield-input" type="text" id="sign" maxlength="20" value="{{$info['sign']}}">
        </div>
	</div>
	<div class="mdui-dialog-actions ">
		<a href="javascript:void(0)" class="mdui-btn mdui-ripple mdui-text-color-primary " mdui-dialog-close>取消</a>
		<a href="javascript:void(0)" class="mdui-btn mdui-ripple mdui-text-color-primary " id="userset">提交</a>
	</div>
</div>
@endif

@endsection

@if(session('user.id')==$id)
@section('js')
<script type="text/javascript">
$(function() {
    $('#del').click(function(){
        mdui.dialog({
        title: '要删除现有封面吗？',
        content: '系统将删除现有封面，并重置为默认封面。',
        buttons: [{text: '取消'},{
            text: '确认',
            onClick: function(inst){
                $.get('{{url('/del')}}',function(){
					location.reload()
				})
            }
            }
        ]
        });
    })

    $('#userset').click(function(){
		$.post('{{url('userset')}}',{
			name:$('#name').val(),
			password:$('#password').val(),
			sign:$('#sign').val(),
			_token: '{{ csrf_token() }}'
		},function(res){
			if(res.code!='0'){
				mdui.snackbar({
                  message: res.msg
                });
                return
			}
			location.reload()
		})
    })

	$('.mc-cover-upload').click(function(){
		document.getElementById('upload_file').click();
	})	

	$('#upload_file').change(function(){
		var myform = new FormData();
		myform.append('file',$('#upload_file')[0].files[0]);
		upload("{{url('upload/cover')}}",myform)
	})

	$('.mc-avatar-upload').click(function(){
		document.getElementById('upload_avatar').click();
	})	

	$('#upload_avatar').change(function(){
		var myform = new FormData();
		myform.append('file',$('#upload_avatar')[0].files[0]);
		upload("{{url('upload/avatar')}}",myform)
	})
});

function upload(url,data){
	data.append('_token','{{ csrf_token() }}');
	$.ajax({
		url: url,
		type: "POST",
		data: data,
		contentType: false,
		processData: false,
		success: function (res) {
			if(res.code!='0'){
				mdui.snackbar({
				message: res.msg
				});
				return
			}
			location.reload()
		},
		error:function(data){
			mdui.snackbar({
				message: '请求中断'
			});
		}
	});
}

</script>
@endsection
@endif