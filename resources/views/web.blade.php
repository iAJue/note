@extends('layouts.app')

@section('title', '广场 - 萌音云笔记')



@section('content')

<div class="mdui-container doc-container doc-no-cover">


<div id="page-questions" class="mdui-container">
<h1 class="doc-title mdui-text-color-theme" style="color: #398DEE!important">最新笔记</h1>
	<div id="recent">
		<div class="item-list">
        @foreach ($Contents as $v)
			<a class="item" href="{{url('web',$v->id)}}" target="_blank">
			<div class="avatar" style="background-image: url({{asset('images/'.$v->user->photo)}});">
			</div>
			<div class="content">
				<div class="title">
					{{$v->title}}
				</div>
				<div class="meta">
					<div class="username">
						{{$v->user->username}}
					</div>
					<div class="answer_time" title="{{$v->created_at}}">
						发表于 {{$v->created_at}}
					</div>
				</div>
			</div>
			<!-- <div class="more">
				<div class="answer_count">
					3
				</div>
			</div> -->
			</a>
        @endforeach
            

		</div>

	</div>
</div>


</div>
@endsection

