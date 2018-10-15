<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/reset.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/Lendform.css')}}"/>
		<title>借出申请</title>
	</head>
	<body>
		<nav class="navbar-default">
			<div class="container">
				<svg onclick="window.location.href='{{url('LendIndex')}}'" style="cursor: pointer" class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui"></use></svg>
				<span>借出申请</span>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
			</div>
		</nav>
		<section>
			<div class="container">
				<div>
					<form action="" method="post">
						{{csrf_field()}}
						<h1>借款人</h1>
						<div class="input-group">
							<input type="text" name="lender_name" class="divinput" autofocus="autofocus">
						</div>
						<h1>借款事由</h1>
						<textarea class="form-control input-lg" name="lender_why"></textarea>
						<h1>借款金额</h1>
						<div class="input-group">
							<span class="divspan input-group-addon glyphicon glyphicon-jpy"></span>
							<input type="tel" name="lender_money" min="0" style="font-size: 48px;" class="divinput">
						</div>
						<h1>借款时间</h1>
						<input name="lender_time" type="date"/> 
						<h1>备注</h1>
						<textarea class="form-control input-lg" name="lender_remarks"></textarea>
						<input type="submit" class="btn btn-success btn-lg btn-block" value="提交"/>
					</form>
				</div>
			</div>
		</section>
	</body>
	<script src="{{asset('resources/views/js/jquery-3.3.1.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/iconfont.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/layer/layer.js')}}" type="text/javascript" charset="utf-8"></script>
	@if(session('message'))
	<script>
        layer.msg('<span style="color: #000">借出申请提交成功！</span>',{icon:6});
        setTimeout(function () {
            window.location.href="{{url('/LendIndex')}}";
		}, 1600);
	</script>
		@endif
</html>
