<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/reset.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/Lendreturn.css')}}"/>
		<title>债务人还款</title>
	</head>
	<body>
		<nav class="navbar-default">
			<div class="container">
				<svg onclick="window.location.href='{{url('LendIndex')}}'" style="cursor: pointer;" class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui"></use></svg>
				<span>债务人还款</span>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
			</div>
		</nav>
		<section>
			<div class="container">未完成</div>
			<hr />
			<div class="container">
				@foreach($Hang as $k=>$v)
				<div onclick="window.location.href='{{url('/Lend/Page/'.$v->lender_id)}}'" style="cursor: pointer;">
					<p>
						<span>借款人：{{$v->lender_name}}</span>
					</p>
					<p>
						<span>借款事由：{{$v->lender_why}}</span>
					</p>
					<p>
						<span>待还金额：{{$v->lender_money_returnd}}</span>
					</p>
					<p>
						<span>借款日期：{{date('Y-m-d',$v->lender_time)}}</span>
					</p>
				</div>
					@endforeach
				@if(!$Hang->first())
						<p style="color: rgb(135,135,135);text-align: center;font-size: 14px;">暂无...</p>
					@endif
			</div>
		</section>
		<section>
			<div class="container">已完成</div>
			<hr />
			<div class="container">
				@foreach($Complete as $k=>$v)
					<div onclick="window.location.href='{{url('/Lend/Page/'.$v->lender_id)}}'" style="cursor: pointer;">
						<p style="position: relative;">
							<span>借款人：{{$v->lender_name}}</span>
							<span onclick="del()" class="glyphicon glyphicon-remove" style="position:absolute;right: 0px; z-index: 999; color: rgb(217,83,79);cursor: pointer;"></span>
						</p>
						<p>
							<span>借款事由：{{$v->lender_why}}</span>
						</p>
						<p>
							<span>借款金额：{{$v->lender_money}}</span>
						</p>
						<p>
							<span>借款日期：{{date('Y-m-d',$v->lender_time)}}</span>
						</p>
					</div>
				@endforeach
					@if(!$Complete->first())
						<p style="color: rgb(135,135,135);text-align: center;font-size: 14px;">暂无...</p>
					@endif
			</div>
		</section>
	</body>
	<script src="{{asset('resources/views/js/jquery-3.3.1.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/iconfont.js')}}" type="text/javascript" charset="utf-8"></script>
	<script>
		function del(event) {
            event.preventDefault();
			alert('233');
        }
	</script>
</html>
