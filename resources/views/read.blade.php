@extends('layouts.app')

@section('title', $res->title . ' - 萌音云笔记')

@section('link')
<link rel="stylesheet" href="{{asset('css/editormd.min.css')}}"/>
<style>body{background-color:#FFF;}</style>
@endsection


@section('content')

<div class="mdui-container doc-container doc-no-cover" style="margin-top:20px;">
<div class="mdui-card">

    <div class="mdui-card-header">
        <a href="{{url('/users',$res->user->id)}}">
        <img class="mdui-card-header-avatar" src="{{asset('images/'.$res->user->photo)}}"></a>
        <div class="mdui-card-header-title">{{$res->user->username}}</div>
        <div class="mdui-card-header-subtitle">{{$res->user->sign}}</div>
        </div>

        <div class="mdui-card-media">
        @if($img)
        <img src="/images/upload/{{$img[1]}}">
        @endif
    </div>

    <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">{{$res->title}}</div>
    <div class="mdui-card-primary-subtitle">{{$res->created_at}}</div>
    </div>

@if ($res->type=='1')
    <div class="mdui-card-content">
        {!!$res->content!!}
    </div>
@else
    <div class="mdui-card-content" style="padding-right: 45px;">
        <div id="content-editormd">
            <textarea style="display:none;">{{$res->content}}</textarea>
        </div>
    </div>
@endif


    <div class="mdui-card-actions">
        <button class="mdui-btn mdui-ripple">点赞</button>
        <button class="mdui-btn mdui-ripple">评论</button>
        <span class="mdui-float-right" style="margin-top: 15px;">最后修改于：{{$res->updated_at}}</span>
    </div>

</div>
</div>

@endsection




@section('js')
<script type="text/javascript">
new mdui.Drawer('#main-drawer').close();
</script>
@if ($res->type=='0')
<script src="{{asset('js/editormd.min.js')}}"></script>
<script src="{{asset('lib/marked.min.js')}}"></script>
<script src="{{asset('lib/prettify.min.js')}}"></script>
<script src="{{asset('lib/raphael.min.js')}}"></script>
<script src="{{asset('lib/underscore.min.js')}}"></script>
<script src="{{asset('lib/sequence-diagram.min.js')}}"></script>
<script src="{{asset('lib/flowchart.min.js')}}"></script>
<script src="{{asset('lib/jquery.flowchart.min.js')}}"></script>
<script type="text/javascript">
    $(function () {     
        editormd.markdownToHTML("content-editormd", {
            htmlDecode: "style,script,iframe", 
            emoji: true,
            taskList: true,
            tex: true,
            flowChart: true, 
            sequenceDiagram: true,
            codeFold: true
        });
    })
</script>
@endif
@endsection

