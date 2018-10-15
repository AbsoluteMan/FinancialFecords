<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/reset.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/DetailedAll.css')}}"/>
		<title>详情页</title>
	</head>
	<body>
		<nav class="navbar-fixed-top">
			<div class="container">
				<svg style="cursor: pointer;" onclick="window.location.href='{{url('detailed')}}'" class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui"></use></svg>
				<span>详情页</span>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
			</div>
		</nav>
		<section>
			<div class="container">
				<p>
					<span>类型:</span>
					<span>@if($data->list_type == 1)收入@endif @if($data->list_type == 2)支出@endif</span>
				</p>
				<p>
					<span>@if($data->list_type == 1)收入@endif @if($data->list_type == 2)支出@endif:</span>
					<span style="font-weight: bold;">{{$data->list_money}}元</span>
				</p>
				<p>
					<span>时间:</span>
					<span>{{ date('Y-m-d H:i:s',$data->list_time)}}</span>
				</p>
				<p>
					<span>总资产:</span>
					<span>{{$data->list_allmoney}}</span>
				</p>
				<p>
					<span>收支原由:</span>
					<span>{{$data->list_remark}}</span>
				</p>
			</div>
		</section>
	</body>
	<script src="{{asset('resources/views/js/jquery-3.3.1.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/iconfont.js')}}" type="text/javascript" charset="utf-8"></script>
</html>
