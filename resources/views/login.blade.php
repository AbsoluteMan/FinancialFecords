<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/reset.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/honeySwitch.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/login.css')}}"/>
		<title>登录</title>
	</head>
	<body>
		<h1>财务管理</h1>
		<div class="container">
			<p>{{session('msg')}}</p>
			<form action="" method="post">
				{{csrf_field()}}
				<div class="input-group input-shadow">
      				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
        			<input class="form-control" name="user_name" placeholder="用户名">
      			</div>
      			<div class="input-group input-shadow">
      				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        			<input type="password" class="form-control" name="user_pass" placeholder="密码">
      			</div>
				<div class="sava">
					<span id="sava-user" class="switch-off"></span>
					<span>记住我的用户</span>
					<div class="clear"></div>
				</div>
				<div>
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="登录"/>
				</div>
			</form>
		</div>
		<footer>Copyright © 2018 XuJiaMao.All Rights Reserved.</footer>
	</body>
	<script src="{{asset('resources/views/js/jquery-3.3.1.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/honeySwitch.js')}}" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function() {
    		switchEvent("#sava-user", function() {
        		alert('1')
    		}, function() {
        		alert('2');
    		});
		});
	</script>
</html>
