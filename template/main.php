<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>
    <div class="n-container" style="padding-left:20px;">

      <div class="n-right-content">
      <div class="clearfix" style="border-bottom:1px solid #eee;display:none">
        <h4 class="n-title fl-l" style="padding:0; margin-right:40px;" >当前项目：<span style="color:#ff4400;" id="current_project">无</span></h4>
        <div class="btn-group fl-l" id="project_list">

        </div>

        <a href="/account/project" style="margin-left:40px;" class="btn btn-primary">创建项目</a>
      </div>
        <br/>
        <h4 class="n-title">能耗节约成效</h4>
        <div class="clearfix">
          <div class="n-show-item">
            <p class="intro">节约电</p>
            <img src="/static/src/img/ic-deng2.png" style="margin-top:-10px;" />
            <p class="num">1000<em>度</em></p>
          </div>
          <div class="n-show-item">
            <p class="intro">节约标准煤</p>
            <img src="/static/src/img/ic-huo2.png" style="width:56px" />
            <p class="num">10000*0.4<em>千克</em></p>
          </div>
          <div class="n-show-item">
            <p class="intro">减少碳排放</p>
            <img src="/static/src/img/ic-paifang2.png" style="width:60px" />
            <p class="num">10000*0.272<em>千克</em></p>
          </div>
          <div class="n-show-item">
            <p class="intro">造林</p>
            <img src="/static/src/img/ic-shu2.png" style="width:52px" />
            <p class="num">100<em>亩</em></p>
          </div>

        </div>
        <br/>
        <h4 class="n-title">拥有基站</h4>
        <div class="n-jizhan-container">
          <img src="/static/src/img/ic-dianzhan2.png" class="ico-item"/>
          <div class="n-table clearfix" id="base_container">
            <div class="n-jizhan-item">
              <p>10-20A </p>
              <p><a href="/base"><?php echo $station_num[0]?>（台）</a></p>
            </div>
            <div class="n-jizhan-item">
              <p>20-30A </p>
              <p><a href="/base"><?php echo $station_num[1]?>（台）</a></p>
            </div>
            <div class="n-jizhan-item">
              <p>30-40A </p>
              <p><a href="/base"><?php echo $station_num[2]?>（台）</a></p>
            </div>
            <div class="n-jizhan-item">
              <p>40-50A </p>
              <p><a href="/base"><?php echo $station_num[3]?>（台）</a></p>
            </div>
            <div class="n-jizhan-item">
              <p>50-60A </p>
              <p><a href="/base"><?php echo $station_num[4]?>（台）</a></p>
            </div>
			<div class="n-jizhan-item">
              <p>60-70A </p>
              <p><a href="/base"><?php echo $station_num[5]?>（台）</a></p>
            </div>
            <div class="n-jizhan-item">
              <p>70A+ </p>
              <p><a href="/base"><?php echo $station_num[6]?>（台）</a></p>
            </div>
            <div class="n-jizhan-item">
              <p><em class="n-total-item">总计</em></p>
              <p><a href="/base"><?php echo $station_num[7]?>（台）</a></p>
            </div>


        <style type="text/css">
        .table th{text-align: center;}
        </style>
        <table class="table table-bordered tl-c">
          <tr>
            <th>&nbsp;</th>
            <th>10-20A</th>
            <th>20-30A</th>
            <th>30-40A</th>
            <th>40-50A</th>
            <th>50-60A</th>
            <th>60-70A</th>
            <th>70A+</th>
            <th><em class="n-total-item">总计</em></th>
          </tr>
          <tr>
            <th>砖墙</th>
            <td><a href="/base"><?php echo $station_num[0]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num[1]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num[2]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num[3]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num[4]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num[5]?>（台）</a></td>
            <td><a href="#">100（台）</a></td>
            <td><a href="/base"><?php echo $station_num[6]?>（台）</a></td>

          </tr>
          <tr>
            <th>板房</th>
            <td><a href="/base"><?php echo $station_num[0]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num[1]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num[2]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num[3]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num[4]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num[5]?>（台）</a></td>
            <td><a href="#">100（台）</a></td>
            <td><a href="/base"><?php echo $station_num[6]?>（台）</a></td>

          </tr>
        </table>
        <br/>
        <h4 class="n-title">故障告警
          <a href="#" class="warning-ico-area">
            <span class="glyphicon glyphicon-bell"></span>
            <span class="badge badge-purple">7</span>
          </a>
        </h4>
        <table class="table table-bordered tl-c">
          <tr>
            <th>断站</th>
            <th>空调故障</th>
            <th>室内高温</th>
            <th>恒温柜高温</th>
            <th>电表故障</th>
            <th>功率异常</th>
            <th>远程关站</th>
            <th>代理维护按钮</th>
          </tr>
          <tr>
            <td><a href="/warning">0</a></td>
            <td><a href="/warning">0</a></td>
            <td><a href="/warning">0</a></td>
            <td><a href="/warning">0</a></td>
            <td><a href="/warning">0</a></td>
            <td><a href="/warning">0</a></td>
            <td><a href="/warning">0</a></td>
            <td><a href="/warning">0</a></td>
          </tr>
        </table>

    </div>

  </div>
  <script>
	var project_list = $('#project_list');
	var base_container = $('#base_container');
	var base_container_a = $('#base_container').find('a');
	$get('/project/list',{
	},function(d){
	   var data = d.data;
	   var html = '';
	   for(var i=0;i<data.length;i++){
	      html += '<button data-id="'+data[i].id+'" type="button" class="switch_project btn btn-default">'+data[i].projectName+'</button>';
	   }
	   if(data[0]){
		   if(document.cookie.indexOf('current_project_id')<0){
			  document.cookie = 'current_project_id='+data[0].id;
			  document.cookie = 'current_project_name='+data[0].projectName;
			  $('#current_project').html(data[0].projectName);
		   }
	   }
	   $('#current_project').html(getCookie('current_project_name'));
	   project_list.html(html);
	});

	project_list.delegate('.switch_project','click',function(){
		var _this = $(this);
		var id = _this.data('id');
		var name = _this.html();
		project_list.find('button').addClass('btn-default');
		_this.removeClass('btn-default');
		document.cookie = 'current_project_id='+ id;
		document.cookie = 'current_project_name='+name;
		$('#current_project').html(name);
		  $get('/station/num',{},function(d){
			 var data = d.data;
			 for(var i = 0;i<data.length;i++){
				base_container_a[i].innerHTML = data[i] + '（台）';
			 }

		  });
	});

  </script>
</body>
</html>
