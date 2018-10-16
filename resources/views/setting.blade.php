<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/reset.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/setting.css')}}"/>
		<title>金额初始化</title>
	</head>
	<body>
		<nav class="navbar-default">
			<div class="container">
				<svg style="cursor: pointer" onclick="window.location.href='{{url('/index')}}'" class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui"></use></svg>
				<span>初始化金额</span>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
			</div>
		</nav>
		<section>
			<div class="container">
				<div>
					<h1>输入金额</h1>
					<form action="" method="post" id="form">
						{{csrf_field()}}
						<div class="input-group">
							<span class="divspan input-group-addon glyphicon glyphicon-jpy"></span>
							<input name="user_money" type="tel" min="0" value="{{$user_money}}" class="divinput">
						</div>
						@foreach($errors->all() as $error)
							<p style="color: red;margin-top: -14px;margin-bottom: 5px;">{{$error}}</p>
							@endforeach
						<input type="button" class="btn btn-success btn-lg btn-block" value="更改"/>
					</form>
				</div>
			</div>
		</section>
	</body>
	<script src="{{asset('resources/views/js/jquery-3.3.1.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/iconfont.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/layer/layer.js')}}" type="text/javascript" charset="utf-8"></script>
	<script>
		$("[type = 'button']").click(function () {
            layer.confirm('初始化金额将会清空所有数据！是否继续？', {
                title: ['警告'],
                btn: ['初始化','关闭'],
				skin: "demo-class"
            }, function(){
                if($("[name = 'user_money']").val() == ''){
                    layer.msg('<span style="color: #000">请输入合法金额！</span>',{icon:5});
				}else{
                    layer.msg('<span style="color: #000;">初始化成功！</span>', {icon: 1});
                    setTimeout(function () {
                        $("#form").submit();
                    },800);
				}
            });
        });
	</script>
</html>
