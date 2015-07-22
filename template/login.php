<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>登录页</title>
    <link href="/static/src/css/base.css" rel="stylesheet">
    <link href="/static/src/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/src/css/login.css" rel="stylesheet">
	  <script src="/static/src/js/jquery.js"></script>
    <style type="text/css">
body{background:#2c2e2f;}
    </style>
  </head>

  <body>

  <div class="login-layout">
      <img class="fl-l" src="/static/src/img/test-logo.png" style="margin-top:12px;" />
      <div class="fl-l" style="margin-left:40px;">
        <h4 class="n-title">能耗云管理系统</span></h4>
        <p class="n-intro">独一无二的大数据能耗管理平台，让节能变得更简单。</p>
        <div class="n-container">

          <form class="form-signin">
            <div class="inner">
              <label for="userName" class="sr-only" id="">用户名</label>
              <input type="text" id="username" class="form-control form-username" placeholder="用户名" required autofocus>
              <label for="inputPassword" class="sr-only">密码</label>
              <input type="password" id="password" class="form-control" placeholder="密码" required>
              <button class="btn btn-lg btn-success btn-block" type="button" id="login_button">登录</button>
            </div>
          </form>

        </div>
      </div>
    </div>


    <script>
	$('#login_button').click(function(){
		var username = $('#username').val();
		var password = $('#password').val();
		$.post('/account/signin',{
		  name:username,
		  password:password
		},function(d){
			if(d.code == 0){
				location.href = '/main';
			}else{
				alert('用户名或密码错误')
			}
		},'json');
	});

	$(window).keydown(function(e){
		if(e.which == 13){
			$('#login_button').trigger('click');
		}
	})
	</script>
  </body>
</html>
