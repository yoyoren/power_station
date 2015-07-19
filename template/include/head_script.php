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
  </script>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">

</head>