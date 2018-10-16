<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/reset.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/Lendpage.css')}}"/>
		<title>还款及详情</title>
	</head>
	<body>
		<nav class="navbar-fixed-top">
			<div class="container">
				<svg onclick="window.location.href='{{url('/Lend/return')}}'" style="cursor: pointer;" class="icon" aria-hidden="true"><use xlink:href="#icon-fanhui"></use></svg>
				<span>还款及详情</span>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
			</div>
		</nav>
		<section>
			<div class="container">
				<span>待还金额</span>
				<span id="money_returnd">{{$lender_data->lender_money_returnd}}</span>
			</div>
			<hr />
			<div class="container">
				<ul>
					<li>
						<span>借款人</span>
						<span>{{$lender_data->lender_name}}</span>
					</li>
					<li>
						<span>借款事由</span>
						<span>{{$lender_data->lender_why}}</span>
					</li>
					<li>
						<span>借款总额</span>
						<span>{{$lender_data->lender_money}}</span>
					</li>
					<li>
						<span>借款时间</span>
						<span>{{date('Y-m-d',$lender_data->lender_time)}}</span>
					</li>
					<li>
						<span>备注</span>
						<span>{{$lender_data->lender_remarks}}</span>
					</li>
					<li>
						<span>系统时间</span>
						<span>{{date('Y-m-d H:i:s',$lender_data->lender_system_time)}}</span>
					</li>
				</ul>
			</div>
			<hr />
		</section>
		@if($lender_data->lender_money_returnd > 0)
		<section>
			<div class="container">
				<div>
					<h1 style="margin-bottom: 10px;">还款金额</h1>
					<form>
						<div class="input-group">
							<span class="divspan input-group-addon glyphicon glyphicon-jpy"></span>
							<input id="moneyinput" type="tel" min="0" class="divinput">
						</div>
						<h1 style="margin-bottom: 10px;">备注</h1>
						<textarea style="margin-bottom: 10px;font-size: 14px;resize: none" class="form-control" id="his_remarks"></textarea>
						<h1 style="margin-bottom: 10px;">还款日期</h1>
						<input id="time" style="margin-bottom: 16px;" type="date">
						<input type="button" onclick="sub()" class="btn btn-success btn-lg btn-block" value="确认"/>
					</form>
				</div>
			</div>
		</section>
		<hr />
		@else
			<section></section>
			@endif
		<section>
			<div class="container" id="show">
			</div>
		</section>
	</body>
	<script src="{{asset('resources/views/js/jquery-3.3.1.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/js/iconfont.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('resources/views/layer/layer.js')}}" type="text/javascript" charset="utf-8"></script>
	<script>
        $(function () {
            $.post('{{url('/Lend/getajax')}}',{'_token':"{{csrf_token()}}",'id':{{$lender_data->lender_id}}},function (data) {
                show(data);
            });
		});
		function sub() {
		    var money = $("#moneyinput").val();
		    var time = $("#time").val();
		    var remarks = $("#his_remarks").val();
			if (money){
			    if(money>0){
			        if (time){
                        if(money<=parseFloat($("#money_returnd").html())){
                            var timestamp = Date.parse(new Date(time)) / 1000;
                            $.post('{{url('/Lend/ajax')}}',{'_token':"{{csrf_token()}}",'lender_id':{{$lender_data->lender_id}},'his_returnd':money,'his_time':timestamp,'his_remarks':remarks,'his_pid':{{$lender_data->lender_id}}},function (data,status) {
                                if (status == 'success') {
                                    layer.msg('<span style="color: #000">还款成功！</span>',{icon:6});
                                    $("#moneyinput").val("");
                                    $("#time").val("");
                                    $("#his_remarks").val("");
                                }else{
                                    layer.msg('<span style="color: #000">服务器繁忙，请稍后重试！</span>',{icon:5});
                                }
                                $.post('{{url('/Lend/ajax_returnd')}}',{'_token':"{{csrf_token()}}",'lender_id':{{$lender_data->lender_id}}},function (data) {
                                    $("#money_returnd").html(data);
                                    if(data <= 0){
                                        window.location.href="{{url('/Lend/return')}}";
									}
                                });
                                show(data);
                            });
						}else{
                            layer.msg('<span style="color: #000">还款金额已大于待还金额！</span>',{icon:5});
						}
					} else{
                        layer.msg('<span style="color: #000">请填写还款日期！</span>',{icon:5});
					}
				}else{
                    layer.msg('<span style="color: #000">请填写大于0的金额！</span>',{icon:5});
				}
			} else{
                layer.msg('<span style="color: #000">您还没有填写还款金额！</span>',{icon:5});
			}
        }
        function show(data) {
            var list="";
            for (x in data) {
                list+="<div>";
                list+="<p>";
                list+="<span>借款人："+"{{$lender_data->lender_name}}"+"</span>";
                list+="</p>";
                list+="<p>";
                list+="<span>还款金额："+data[x]['his_returnd']+"</span>";
                list+="</p>";
                list+="<p>";
                list+="<span>还款日期："+ timetrans(data[x]['his_time'],1)+"</span>";
                list+="</p>";
                list+="<p>";
                list+="<span>系统时间："+timetrans(data[x]['his_system_time'],2)+"</span>";
                list+="</p>";
                list+="<p>";
                list+="<span>备注："+data[x]['his_remarks']+"</span>";
                list+="</p>";
                list+="</div>";
            }
            $("#show").html(list);
        }
        function timetrans(date,type){
            var date = new Date(date*1000);//如果date为10位不需要乘1000
            var Y = date.getFullYear() + '-';
            var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
            var D = (date.getDate() < 10 ? '0' + (date.getDate()) : date.getDate()) + ' ';
            var h = (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':';
            var m = (date.getMinutes() <10 ? '0' + date.getMinutes() : date.getMinutes()) + ':';
            var s = (date.getSeconds() <10 ? '0' + date.getSeconds() : date.getSeconds());
            if(type == 1){
                return Y+M+D;
            }
			if(type == 2){
                return Y+M+D+h+m+s;
			}
        }
	</script>
</html>
