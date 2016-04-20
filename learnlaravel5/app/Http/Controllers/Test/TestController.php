<?php namespace App\Http\Controllers\Test;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Redirect, Input;

class TestController extends Controller {



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return view('test.train');

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request)
	{
		header('Content-type:text/html;charset=utf-8');
		$appkey = "3d08b9bac6a5887ff42374a73145e3b6";

		$start = Input::get('start');
		$stop = Input::get('stop');
		$time = Input::get('time');


		function juhecurl($url,$params=false,$ispost=0){
			$httpInfo = array();
			$ch = curl_init();

			curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
			curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
			curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
			curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			if( $ispost )
			{
				curl_setopt( $ch , CURLOPT_POST , true );
				curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
				curl_setopt( $ch , CURLOPT_URL , $url );
			}
			else
			{
				if($params){
					curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
				}else{
					curl_setopt( $ch , CURLOPT_URL , $url);
				}
			}
			$response = curl_exec( $ch );
			if ($response === FALSE) {
		        //echo "cURL Error: " . curl_error($ch);
				return false;
			}
			$httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
			$httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
			curl_close( $ch );
			return $response;
		}

		$successMessage = array('status' => true,'msg' => '保存成功');
		$failureMessage = array('status' => false,'msg' => '保存失败');

		$url = "http://apis.juhe.cn/train/ticket.cc.php";
		$params = array(
	      "from" => $start,//出发站名称：如上海虹桥
	      "to" => $stop,//到达站名称：如温州南
	      "date" => $time,//默认当天，格式：2014-07-11
	      "tt" => "",//车次类型，默认全部，如：G(高铁)、D(动车)、T(特快)、Z(直达)、K(快速)、Q(其他)
	      "key" => $appkey,//应用APPKEY(应用详细页查询)
	      );
		$paramstring = http_build_query($params);
		$content = juhecurl($url,$paramstring);
		$result = json_decode($content,true);
		if($result){
			if($result['error_code']=='0'){
				//var_dump($result['result'][0]['queryLeftNewDTO']['station_train_code']);
				//$data = $
				//var_dump($content);
				//return view('test')->with('data',$result);
				return $result;
			}else{
				echo $result['error_code'].":".$result['reason'];
			}
		}else{
			echo "请求失败";
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function result()
	{
		return view('test.trainlist');
	}

	// public function list()
	// {
	// 	return view('test.trainlist');
	// }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function detail($id)
	{
		$number = $id;
		header('Content-type:text/html;charset=utf-8');
		$appkey = "3d08b9bac6a5887ff42374a73145e3b6";

		function juhecurl($url,$params=false,$ispost=0){
			$httpInfo = array();
			$ch = curl_init();

			curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
			curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
			curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
			curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			if( $ispost )
			{
				curl_setopt( $ch , CURLOPT_POST , true );
				curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
				curl_setopt( $ch , CURLOPT_URL , $url );
			}
			else
			{
				if($params){
					curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
				}else{
					curl_setopt( $ch , CURLOPT_URL , $url);
				}
			}
			$response = curl_exec( $ch );
			if ($response === FALSE) {
				return false;
			}
			$httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
			$httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
			curl_close( $ch );
			return $response;
		}

		$url = "http://apis.juhe.cn/train/s";
		$params = array(
		  "name" => $number,//车次名称，如：G4
		  "key" => $appkey,//应用APPKEY(应用详细页查询)
		  "dtype" => "json",//返回数据的格式,xml或json，默认json
		  );
		$paramstring = http_build_query($params);
		$content = juhecurl($url,$paramstring);
		$result = json_decode($content,true);
		if($result){
			if($result['error_code']=='0'){
				//var_dump($result);
				return view('test.detail')->with('data',$result);
			}else{
				echo $result['error_code'].":".$result['reason'];
			}
		}else{
			echo "请求失败";
		}
		//return view('test.detail');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function onetrain()
	{
		return view('test.onetrain');
	}
	public function number()
	{
		return view('test.number');
	}

	public function superfluous(Request $request)
	{
		header('Content-type:text/html;charset=utf-8');
		$appkey = "3d08b9bac6a5887ff42374a73145e3b6";

		$start = Input::get('start');
		$stop = Input::get('stop');
		$time = Input::get('time');


		function juhecurl($url,$params=false,$ispost=0){
			$httpInfo = array();
			$ch = curl_init();

			curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
			curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
			curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
			curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			if( $ispost )
			{
				curl_setopt( $ch , CURLOPT_POST , true );
				curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
				curl_setopt( $ch , CURLOPT_URL , $url );
			}
			else
			{
				if($params){
					curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
				}else{
					curl_setopt( $ch , CURLOPT_URL , $url);
				}
			}
			$response = curl_exec( $ch );
			if ($response === FALSE) {
		        //echo "cURL Error: " . curl_error($ch);
				return false;
			}
			$httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
			$httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
			curl_close( $ch );
			return $response;
		}

		$successMessage = array('status' => true,'msg' => '保存成功');
		$failureMessage = array('status' => false,'msg' => '保存失败');

		$url = "http://apis.juhe.cn/train/yp";
		$params = array(
	      "from" => $start,//出发站名称：如上海虹桥
	      "to" => $stop,//到达站名称：如温州南
	      "date" => $time,//默认当天，格式：2014-07-11
	      "tt" => "",//车次类型，默认全部，如：G(高铁)、D(动车)、T(特快)、Z(直达)、K(快速)、Q(其他)
	      "key" => $appkey,//应用APPKEY(应用详细页查询)
	      );
		$paramstring = http_build_query($params);
		$content = juhecurl($url,$paramstring);
		$result = json_decode($content,true);
		if($result){
			if($result['error_code']=='0'){
				//var_dump($result['result'][0]['queryLeftNewDTO']['station_train_code']);
				//$data = $
			//	var_dump($result);
				//return view('test')->with('data',$result);
				return $result;
			}else{
				echo $result['error_code'].":".$result['reason'];
			}
		}else{
			echo "请求失败";
		}
	}













}
