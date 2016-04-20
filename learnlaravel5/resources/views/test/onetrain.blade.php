<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, 
	user-scalable=no" />
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="frame/jquery.mobile-1.4.5.min.css" />
</head>
<body>
<input type="hidden" name="_token" value="{csrf_token()}"/>
	<div data-role='page' id="index">
		<div data-role='header' data-position='fixed'>
			<h1>单个搜索</h1>
		</div>
		<div data-role='main' class="ui-content">
			<label for="number">车次号：</label>
			<input type="text" name="train" id="train" >  
			<a  id="search" class="ui-btn">搜索</a>
		</div>
		<div data-role='footer' data-position='fixed'>
			<div data-role='navbar'>
				<ul>
					<li><a href="../test" data-icon='camera'>查询</a></li>
					<li><a href="../detail" data-icon='camera'>详情</a></li>
					<li><a href="../number"data-icon='camera'>票数</a></li>
				</ul>
			</div>
		</div>
	</div>

	<script src="frame/jquery.js"></script>
	<script src="frame/jquery.mobile-1.4.5.min.js"></script>	
	<script src="js/test/test.js"></script>	
</body>
</html>