<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/reset.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/Detailed.css')}}"/>
		<title>明细</title>
	</head>
	<body>
		<nav class="navbar-fixed-top">
			<div class="container">
				<svg style="cursor: pointer;" onclick="window.location.href='{{url('index')}}'" class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui"></use></svg>
				<span>明细</span>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
			</div>
		</nav>
		@foreach($data as $v)
		<section style="cursor: pointer;" onclick="window.location.href='{{url('/detailedall/'.$v->list_id)}}'">
			<div class="container">
				<p>
					<span class="color1">@if($v->list_type == 1) 收入 @endif @if($v->list_type == 2) 支出 @endif</span>
					<span class="color3">{{date('Y-m-d H:i:s',$v -> list_time)}}</span>
				</p>
				<p>
					<span class="color2">总资产：{{$v -> list_allmoney}}</span>
					@if($v->list_type == 1)<span>+{{$v -> list_money}}</span>@endif
					@if($v->list_type == 2)<span>-{{$v -> list_money}}</span>@endif
				</p>
			</div>
		</section>
			@endforeach
		@if(!$data->first())
			<p style="color: rgb(135,135,135);text-align: center;font-size: 14px;margin-top: 48px;">暂无数据...</p>
		@endif
	</body>
	<script src="{{asset('resources/views/js/jquery-3.3.1.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/iconfont.js')}}" type="text/javascript" charset="utf-8"></script>
</html>
