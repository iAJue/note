@extends('layouts.app')

@section('title', '萌音云笔记')

@section('link')
<link rel="stylesheet" type="text/css" href="{{asset('css/simditor.css')}}">
@endsection

@section('content')
@include('layouts.title')



<textarea id="editor" autofocus name="content">{{$content->content}}</textarea>
@endsection

@section('js')
<script type="text/javascript" src="{{asset('js/module.js')}}"></script>
<script type="text/javascript" src="{{asset('js/hotkeys.js')}}"></script>
<script type="text/javascript" src="{{asset('js/uploader.js')}}"></script>
<script type="text/javascript" src="{{asset('js/simditor.js')}}"></script>
<script type="text/javascript">
    new Simditor({
        textarea: $('#editor'),
        upload: {
            url:'{{url('upload')}}',
            params:{_token:'{{csrf_token()}}'}
        },
        defaultImage:'/images/image.png',
        placeholder: '随便记点什么吧.....',
        pasteImage:true,
        toolbar : ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment'],
    });

    $('#save').click(function () {
        $('#save').html('保存中');
    	$.post('{{url('save')}}',{
            title:$('#title').val(),
            content:$('#editor').val(),
            _token:'{{csrf_token()}}',
            id:'{{$content->id}}'
        },function(res){
            mdui.snackbar({
                message: res.msg,
                timeout:500
            });
        })
        $('#save').html('保存');
    })

    window.setInterval(function(){
        $('#save').click()
    }, 30000);
</script>
@endsection