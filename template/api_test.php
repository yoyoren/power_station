<style>
button {margin:5px;padding:5px;}
</style>
<h2>账户模块API</h2>
<button onclick="account_add()">account_add（添加账户）</button></br>
<button onclick="account_signin()">account_signin（账户登录）</button></br>
<button onclick="account_logout()">account_logout（账户注销）</button></br>
<button onclick="account_islogin()">account_islogin（账户是否登录）</button></br>
<button onclick="account_lock()">account_lock（账户锁定）</button></br>
<button onclick="account_unlock()">account_unlock（账户解锁）</button></br>
<button onclick="account_list()">account_list（获得注册账户列表）</button></br>
<button onclick="account_list_with_project()">account_list_with_project（获得用户的同时获得用户的项目）</button></br>
<button onclick="account_addproject()">account_addproject（增加一个用户到某项目）</button></br>
<button onclick="account_updateproject()">account_updateproject(批量更新一个用户的项目权限)</button></br>
<button onclick="account_getproject()">account_getproject(获得一个用户的项目权限)</button></br>

<h2>ECU API</h2>
<button onclick="ECU_read()">ECU_read(读取ECU原始数据)</button></br>
<button onclick="ECU_scan()">ECU_scan(ECU目录扫描)</button></br>
<h2>项目 API</h2>
<button onclick="project_add()">project_add(增加一个项目)</button></br>
<button onclick="project_list()">project_list(项目列表)</button></br>
<h2>基站 API</h2>
<button onclick="station_add()">station_add(增加一个基站数据)</button></br>
<button onclick="station_remove()">station_remove(删除一个基站数据)</button></br>
<button onclick="station_online()">station_online(恢复一个已经删除的基站数据)</button></br>
<button onclick="station_list()">station_list(基站数据列表)</button></br>
<script src="/static/src/js/jquery.js"></script>
<script>

window.project_add = function(){
	$.post('/project/add',{
	  name:'测试项目'
	},function(d){

	},'json');
}


window.project_list = function(){
	$.get('/project/list',{
	},function(d){

	},'json');
}



window.account_add = function(){
	$.post('/account/add',{
	  name:'test4',
	  password:'test',
	  type : 1
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

window.account_addproject = function(){
	$.post('/account/addproject',{
	  project_id:1,
	  user_id:1
	},function(d){

	},'json');
}

window.account_updateproject = function(){
	$.post('/account/updateproject',{
	  project_id:'1,2',
	  user_id:1
	},function(d){

	},'json');
}


window.account_getproject = function(){
	$.get('/account/getproject',{
		user_id:1
	},function(d){

	},'json');
}

window.account_list = function(){
	$.get('/account/list',{
	  start:0,
	  end:10
	},function(d){

	},'json');
}

window.account_list_with_project = function(){
	$.get('/account/list_with_project',{
	  start:0,
	  end:10
	},function(d){

	},'json');
}

window.ECU_read = function(){
	$.get('/ecu/read',{
    },function(d){

	},'json');
}

window.ECU_scan = function(){
	$.get('/ecu/scan',{
    },function(d){

	},'json');
}

window.station_add = function(){
	$.post('/station/add',{
	  name:'test2',
	  code:'code',
	  type:'0',
	  project:'project',
	  province:'北京',
	  city:'北京',
	  distirct:'海淀区',
	  address:'知春路',
	  lat:'110.11',
	  lng:'210.11'
	},function(d){

	},'json');
}

window.station_remove = function(){
	$.post('/station/offline',{
		id : '1'
	},function(d){

	},'json');
}

window.station_online = function(){
	$.post('/station/online',{
		id : '1'
	},function(d){

	},'json');
}

window.station_list = function(){
	$.get('/station/list',{
		start:0,
		end:10
	},function(d){

	},'json');
}
</script>