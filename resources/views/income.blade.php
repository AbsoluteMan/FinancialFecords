<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/reset.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/income.css')}}"/>
		<title>收入</title>
	</head>
	<body>
		<nav class="navbar-default">
			<div class="container">
				<svg onclick="window.location.href='{{url('/index')}}'" style="cursor: pointer" class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui"></use></svg>
				<span>收入</span>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
			</div>
		</nav>
		<section>
			<div class="container">
				<div>
					<h1>收入金额</h1>
					<form action="" method="post">
						{{csrf_field()}}
						<div class="input-group">
							<span class="divspan input-group-addon glyphicon glyphicon-jpy"></span>
							<input name="list_money" type="tel" min="0" class="divinput" autofocus="autofocus">
						</div>
						<h1>备注</h1>
						<textarea name="list_remark" class="form-control input-lg" name="income_remarks" rows="" cols=""></textarea>
						@foreach($errors->all() as $error)
							<p style="color: red;margin-top: -14px;margin-bottom: 5px;">{{$error}}</p>
							@break
						@endforeach
						<input type="submit" class="btn btn-success btn-lg btn-block" value="确定"/>
					</form>
				</div>
			</div>
		</section>
	</body>
	<script src="{{asset('resources/views/js/jquery-3.3.1.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/iconfont.js')}}" type="text/javascript" charset="utf-8"></script>
</html>
