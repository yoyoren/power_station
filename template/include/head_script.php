<head>
  <meta chraset="utf-8">
  <title>能耗系统</title>
  <link rel="stylesheet" type="text/css" href="/static/src/css/base.css">
  <link rel="stylesheet" type="text/css" href="/static/src/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/static/src/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" type="text/css" href="/static/src/css/main.css">
  <script src="/static/src/js/jquery.js"></script>
  <script src="/static/src/js/bootstrap.min.js"></script>
  <script>
  $request = function(method,url,data,fn){
	var  data = data||{};
	$[method](url,data,function(d){
		fn && fn(d);
	},'json');
  }
  
  $get = function(url,data,fn){
	$request('get',url,data,fn);
  }
  
  $post = function(url,data,fn){
	$request('post',url,data,fn);
  }
  
  window.getCookie = function(key) {
      var _c = document.cookie.split(key+'=')[1];
      if (_c) {
        _c = _c.split(';')[0];
        return _c;
      }
      return '';
    }
	var WARNING_MSG = {
		'1':'断站',
		'2':'室内高温',
		'3':'恒温柜高温',
		'4':'电表故障',
		'5':'功率异常',
		'6':'远程关站',
		'7':'代理维护按钮',
		'8':'空调故障',
		'9':'温度感应故障'
  };
  function getNowFormatDate(day) { 
	day = new Date(day);
	var Year = 0; 
	var Month = 0; 
	var Day = 0; 
	var CurrentDate = ""; 

	Year= day.getFullYear();
	Month= day.getMonth()+1; 
	Day = day.getDate(); 
	CurrentDate += Year + "-"; 
	if (Month >= 10 ) 
	{ 
	CurrentDate += Month + "-"; 
	} 
	else 
	{ 
	CurrentDate += "0" + Month + "-"; 
	} 
	if (Day >= 10 ) 
	{ 
	CurrentDate += Day ; 
	} 
	else 
	{ 
	CurrentDate += "0" + Day ; 
	} 
	var minute = day.getMinutes();
	if(minute<10){
		minute = '0' + minute;
	}
	CurrentDate+= ' ' + day.getHours() + ':' + minute;
	return CurrentDate; 
}
  </script>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">

</head>