<style>
button {margin:5px;padding:5px;}
</style>
<h2>账户模块API</h2>
<button onclick="account_add()">account_add（添加账户）</button></br>
<button onclick="account_signin()">account_signin<（账户登录）</button></br>
<button onclick="account_logout()">account_logout（账户注销）</button></br>
<button onclick="account_islogin()">account_islogin（账户是否登录）</button></br>
<button onclick="account_lock()">account_lock（账户锁定）</button></br>
<button onclick="account_unlock()">account_unlock（账户解锁）</button></br>
<script src="/static/src/js/jquery.js"></script>
<script>
window.account_add = function(){
	$.post('/account/add',{
	  name:'test2',
	  password:'test'
	},function(d){

	},'json');
}

window.account_signin = function(){
	$.post('/account/signin',{
	  name:'test2',
	  password:'test'
	},function(d){

	},'json');
}

window.account_islogin = function(){
	$.get('/account/islogin',{
	},function(d){

	},'json');
}

window.account_logout = function(){
	$.get('/account/logout',{
	},function(d){

	},'json');
}

window.account_lock = function(){
	$.post('/account/lock',{
	  name:'test2'
	},function(d){

	},'json');
}

window.account_unlock = function(){
	$.post('/account/unlock',{
	  name:'test2'
	},function(d){

	},'json');
}
</script>