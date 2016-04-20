<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, 
	user-scalable=no" />
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('frame/jquery.mobile-1.4.5.min.css') }}" />
</head>
<body>
<input type="hidden" name="_token" value="{csrf_token()}"/>
	<div data-role='page' id="index">
		<div data-role='header' data-position='fixed'>
			<h1>余票搜索</h1>
		</div>
		<div data-role='main' class="ui-content">
			<label for="fullname">出发站：</label>
			<input type="text" name="from-stain" id="from-stain" >  
			<label for="fullname">到达站：</label>
			<input type="text" name="to-stain" id="to-stain" > 
			<label for="fullname">出发时间：</label>
			<input type="text" name="" id="number-time" placeholder="格式：2016-07-07" >  
			<div class="test">
			
			</div>     
			<a href="#" id="number-ajax" class="ui-btn">点我搜索</a>
		</div>
		<div data-role='footer' data-position='fixed'>
			<div data-role='navbar'>
				<ul>
					<li><a href="../test" data-icon='camera'>查询</a></li>
					<li><a href="../detail" data-icon='camera'>详情</a></li>
					<li><a href="../num"data-icon='camera'>票数</a></li>
				</ul>
			</div>
		</div>
	</div>

	<script src="frame/jquery.js"></script>
	<script src="frame/jquery.mobile-1.4.5.min.js"></script>	
	<script src="js/test/test.js"></script>	
</body>
</html>