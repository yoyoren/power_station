<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>登录页</title>
    <link href="/static/src/css/base.css" rel="stylesheet">
    <link href="/static/src/css/bootstrap.min.css" rel="stylesheet">
	<script src="/static/src/js/jquery.js"></script>
<style type="text/css">
html{height: 100%; overflow: hidden;}
body {
  padding-top: 40px;
  padding-bottom: 40px;
  height: 100%;
  box-sizing:border-box;
  background:url(/static/src/img/big-bg.png) center center no-repeat;
  background-size: cover;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input.form-username {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.form-signin input.form-checkcode{width: 200px; display: inline-block; vertical-align: middle;}
.checkcode-img{width: 80px; height: 44px; background: #eee; display: inline-block; vertical-align: middle; border-radius: 4px;
overflow: hidden;}

.n-container{width: 600px; margin: 0 auto; background: rgba(255,255,255,.2); border-radius: 10px; position: absolute; top:50%; left: 50%; margin-left: -300px; margin-top: -150px; border: 1px solid #eee;
  box-shadow: 0 2px 2px #333;}

.form-control{border:1px solid #999;}
.error-tip{color: #ff4400; padding: 4px 10px; background: #fff; }
</style>

  </head>

  <body>

    <div class="n-container">

      <form class="form-signin">
        <h2 class="form-signin-heading">能耗管理云系统</h2>

        <label for="userName" class="sr-only" id="">用户名</label>
        <input type="text" id="username" class="form-control form-username" placeholder="用户名" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="password" class="form-control" placeholder="密码" required>

        <div class="clearfix" style="margin-bottom:20px;display:none">
          <label for="checkCode" class="sr-only">验证码</label>
          <input type="text" id="checkCode" class="form-control form-checkcode" placeholder="验证码" required>
          <img src="" class="checkcode-img fl-r" />
        </div>
        <p class="error-tip" style="margin-bottom:20px;display:none">错误信息存放处</p>
        <button class="btn btn-lg btn-success btn-block" type="button" id="login_button">登录</button>
      </form>

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
	</script>
  </body>
</html>
