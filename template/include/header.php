<div class="n-head clearfix">
      <div class="n-logo fl-l" id="header_logo">
        <img class="ico-logo" src="/static/src/img/ic-nenghao2.png" /><span class="vl-m">能耗管理云系统</span>
      </div>
      <ul class="n-head-nav fl-l" id="header_nav">
        <li><a class="current" href="/main" id="tab_main">首页</a></li>
        <li><a href="/base" id="tab_base">基站</a></li>
        <li><a href="/warning" id="tab_warning">故障告警</a></li>
        <li><a href="/ammeter" id="tab_ammeter">电表</a></li>
        <li><a href="/log" id="tab_log">维护</a></li>
        <li><a href="/report" id="tab_report">报表</a></li>
        <li><a href="/account" id="tab_account">账户</a></li>
      </ul>
      <div class="n-logout fl-r">你好，管理员，<span class="name" id="header_name"></span><a href="#" id="header_logout" class="func">退出</a></div>
    </div>
	<script>
	(function(){

		var path = location.pathname.split('/')[1];
		if(path){
			$('#header_nav').find('a').removeClass('current');
			$('#tab_'+path).addClass('current');
		}
		$('#header_logo').click(function(){
			location.href = '/main';
		});

		$('#header_logout').click(function(){
			$.get('/account/logout',{
			},function(d){
				location.href = '/login';
			},'json');
		});
		var name = document.cookie.split('user_name=')[1];
		name = name.split(';')[0];
		$('#header_name').html(name);
	})();
	</script>
