<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/reset.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/main.css')}}"/>
		<title>资产管理系统</title>
	</head>
	<body>
		<nav class="navbar-fixed-top">
			<div class="container">
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<span>资产管理</span>
				<span style="cursor: pointer;" onclick="window.location.href='{{url('detailed')}}'">明细</span>
			</div>
		</nav>
		<header>
			<div class="container">
				<h2>当前资产(元)</h2>
				<div>
					<span>{{$now_money}}</span>
					<span>总资产({{$all_money}})</span>
				</div>
			</div>
			<div>
				<div class="container">总资产指所有债收回后的资产</div>
			</div>
		</header>
		<section>
			<ul>
				<li>
					<div onclick="window.location.href='{{url('income')}}'" class="container">
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-wodeshouru"></use></svg>
						<span>收入</span>
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui-copy"></use></svg>
					</div>
				</li>
				<li>
					<div onclick="window.location.href='{{url('pay')}}'" class="container">
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-zhichu"></use></svg>
						<span>支出</span>
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui-copy"></use></svg>
					</div>
				</li>
				<li>
					<div onclick="window.location.href='{{url('LendIndex')}}'" class="container">
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-jiekuanshenqing"></use></svg>
						<span>借出</span>
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui-copy"></use></svg>
					</div>
				</li>
				<li onclick="window.location.href='{{url('setting')}}'" style="margin-top: 10px">
					<div class="container">
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-shezhi"></use></svg>
						<span>金额初始化</span>
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui-copy"></use></svg>
					</div>
				</li>
				<li><a class="btn-danger btn-block" href="{{url('quit')}}">退出登陆</a></li>
			</ul>
		</section>
		<footer></footer>
	</body>
	<script src="{{asset('resources/views/js/jquery-3.3.1.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/iconfont.js')}}" type="text/javascript" charset="utf-8"></script>
</html>
