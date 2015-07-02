<button onclick="account_add()">account_add</button>
<button onclick="account_signin()">account_signin</button>
<button onclick="account_logout()">account_logout</button>
<button onclick="account_islogin()">account_islogin</button>
<button onclick="account_lock()">account_lock</button>
<button onclick="account_unlock()">account_unlock</button>
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