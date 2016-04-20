<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, 
	user-scalable=no" />
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../frame/jquery.mobile-1.4.5.min.css" />
</head>
<body>
<input type="hidden" name="_token" value="{csrf_token()}"/>
	<div data-role='page' id="index">
		<div data-role='header' data-position='fixed'>
			<h1>我是标题2</h1>
		</div>
		<div data-role='main' class="ui-content">
		<?php foreach ($data['result']['station_list'] as $data) {?>
		<label>站点：{{$data['station_name']}}---到站时间：{{$data['arrived_time']}}---离站时间：{{$data['leave_time']}}</label>
		<?php }?>
		</div>
		<div data-role='footer' data-position='fixed'>
			<div data-role='navbar'>
				<ul>
					<li><a href="../test" data-icon='camera'>查询</a></li>
					<li><a href="../detail" data-icon='camera'>详情</a></li>
					<li><a href="../num" data-icon='camera'>票数</a></li>
				</ul>
			</div>
		</div>
	</div>

	
	<script src="../frame/jquery.js"></script>
	<script src="../frame/jquery.mobile-1.4.5.min.js"></script>	
	<script src="../js/test/test.js"></script>	
</body>
</html>