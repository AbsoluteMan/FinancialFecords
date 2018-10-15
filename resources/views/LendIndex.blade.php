<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/reset.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/LendIndex.css')}}"/>
		<title>借出</title>
	</head>
	<body>
		<nav class="navbar-default">
			<div class="container">
				<svg onclick="window.location.href='{{url('/index')}}'" style="cursor: pointer" class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui"></use></svg>
				<span>借出</span>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
			</div>
		</nav>
		<section>
			<ul>
				<li>
					<div onclick="window.location.href='{{url('/Lend/form')}}'" class="container">
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-jiekuanshenqing"></use></svg>
						<span>借出申请</span>
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui-copy"></use></svg>
					</div>
				</li>
				<li>
					<div onclick="window.location.href='{{url('/Lend/return')}}'" class="container">
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-qiandai"></use></svg>
						<span>债务人还款</span>
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui-copy"></use></svg>
					</div>
				</li>
				<li>
					<div class="container">
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-lishibaogao"></use></svg>
						<span>历史记录</span>
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui-copy"></use></svg>
					</div>
				</li>
			</ul>
		</section>
	</body>
	<script src="{{asset('resources/views/js/jquery-3.3.1.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/iconfont.js')}}" type="text/javascript" charset="utf-8"></script>
</html>
