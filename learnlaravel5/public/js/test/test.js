$(function(){
	send_train_data();
	search_one_train();
	number_search();
	reload();
})
function reload(argument) {
	$('li>a').click(function(){
		window.location.reload();
	})
}



function send_train_data() {
	$('#ajaxbtn').click(function(){
		$.mobile.loading('show', {  
        text: '加载中...', //加载器中显示的文字  
        textVisible: true, //是否显示文字  
        theme: 'a',        //加载器主题样式a-e  
        textonly: false,   //是否只显示文字  
        html: ""           //要显示的html内容，如图片等  
    });  
		var start = $('#train-start').val();
		var stop = $('#train-stop').val();
		var time = $('#time').val();
		$.ajax({
			url: 'showtrainlist',
			type: "post",
			async: true,
			data: {
				start:start,stop:stop,time:time
			},
			dataType: "json",
			headers: {
				'X-CSRF-Token': $('meta[name=_token]').attr('content')
			},
			success: function(data) {
				for (var i = data.result.length - 1; i >= 0; i--) {
					var _html = "<a href='"+('../detail/'+data.result[i].queryLeftNewDTO.station_train_code)+"'>"
					+"<span for='train-number'>"+data.result[i].queryLeftNewDTO.station_train_code+"</span>"
					+"<span for='start_station_name'>"+"---"+data.result[i].queryLeftNewDTO.start_station_name+"</span>"
					+"<span for='end_station_name'>"+"---"+data.result[i].queryLeftNewDTO.end_station_name+"</span>"
					+"</a>"
					+"<hr>";
					$('.test').append(_html);
				}
				$.mobile.loading('hide');  
			},
			error:function(){
				alert('fail');
				$.mobile.loading('hide');  
			}
		})
	})
}


function search_one_train() {
	$('#search').on('tap',function(){
		var number = $('#train').val();
		window.location.href='/detail/'+number;
		$.mobile.loading('show', {  
        text: '加载中...', //加载器中显示的文字  
        textVisible: true, //是否显示文字  
        theme: 'a',        //加载器主题样式a-e  
        textonly: false,   //是否只显示文字  
        html: ""           //要显示的html内容，如图片等  
    });  

	})
}


function number_search() {
	$('#number-ajax').on('tap',function(){
		$('.test').children().remove();
		$.mobile.loading('show', {  
        text: '加载中...', //加载器中显示的文字  
        textVisible: true, //是否显示文字  
        theme: 'a',        //加载器主题样式a-e  
        textonly: false,   //是否只显示文字  
        html: ""           //要显示的html内容，如图片等  
    	});  
		var start = $('#from-stain').val();
		var stop = $('#to-stain').val();
		var time = $('#number-time').val();
		$.ajax({
			url: 'superfluous',
			type: "post",
			async: true,
			data: {
				start:start,stop:stop,time:time
			},
			dataType: "json",
			headers: {
				'X-CSRF-Token': $('meta[name=_token]').attr('content')
			},
			success: function(data) {
				for (var i = data.result.length - 1; i >= 0; i--) {
					var _html =
					"<span for='train-number'>"+data.result[i].train_no+"</span>"
					 +"<span for='start_station_name'>"+"软卧:"+data.result[i].rw_num+"</span>"
					 +"<span for='end_station_name'>"+"软座:"+data.result[i].rz_num+"</span>"
					 +"<span for='end_station_name'>"+"特等座:"+data.result[i].tz_num+"</span>"
					 +"<span for='end_station_name'>"+"无座:"+data.result[i].wz_num+"</span>"
					 +"<span for='end_station_name'>"+"硬卧:"+data.result[i].yw_num+"</span>"
					 +"<span for='end_station_name'>"+"硬座:"+data.result[i].yz_num+"</span>"
					 +"<span for='end_station_name'>"+"二等座:"+data.result[i].ze_num+"</span>"
					 +"<span for='end_station_name'>"+"一等座:"+data.result[i].zy_num+"</span>"
					 +"<span for='end_station_name'>"+"商务座:"+data.result[i].swz_num+"</span>"
					+"<hr>";
					$('.test').append(_html);
				}
				$.mobile.loading('hide');  
			},
			error:function(){
				alert('fail');
				$.mobile.loading('hide');  
			}
		})


	})
}








