@extends('layouts.app')

@section('title', '萌音云笔记')

@section('link')
<meta name="_token" content="{{ csrf_token() }}"/>
<link rel="stylesheet" href="{{asset('css/editormd.css')}}"/>
@endsection

@section('content')
@include('layouts.title')
<div id="content-editormd" class="form-group">
    <textarea class="form-control" id="content-editormd-markdown-doc" name="content-editormd-markdown-doc">{{$content->content}}</textarea>
</div>
@endsection

@section('js')
<script src="{{asset('js/editormd.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        editormd("content-editormd", {
            width   : "100%",
            height  : 800,
            syncScrolling : "single",
            path    : "/lib/",
            saveHTMLToTextarea : true, 
            imageUpload : true,
            imageFormats: ["jpg","jpeg","gif","png","webp"],
            imageUploadURL: "{{url('upload')}}",
        });
        $('#save').click(function () {
            $('#save').html('保存中');
            $.post('{{url('save')}}',{
                title:$('#title').val(),
                content:$('#content-editormd-markdown-doc').val(),
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
        });
</script>
@endsection