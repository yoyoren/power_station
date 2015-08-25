<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body style="background:#f5f5f5;">
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
        <div style="background:#fff; padding:20px; margin-top:20px;">
          <h4 class="n-title">能耗节约成效</h4>
          <div class="clearfix" style="padding-bottom:20px;">
            <div class="n-show-item" style="background:#0099e1;">
              <p class="intro">节约电</p>
              <img src="/static/src/img/ic-deng2.png" style="margin-top:-10px;" />
               <p class="num"><span id="start_num"></span><em>度</em></p>
            </div>
            <div class="n-show-item" style="background:#ff4660;">
              <p class="intro">节约标准煤</p>
              <img src="/static/src/img/ic-huo2.png" style="width:56px" />
              <p class="num" id=""><span id="start_num_mei"></span><em>吨</em></p>
            </div>
            <div class="n-show-item" style="background:#cca402;">
              <p class="intro">减少碳排放</p>
              <img src="/static/src/img/ic-paifang2.png" style="width:60px" />
              <p class="num"  id=""><span id="start_num_co"></span><em>吨</em></p>
            </div>
            <div class="n-show-item" style="background:#4ebd21;">
              <p class="intro">造林</p>
              <img src="/static/src/img/ic-shu2.png" style="width:52px" />
              <p class="num" id=""><span id="start_num_tree"></span><em>亩</em></p>
            </div>
          </div>
        </div>

        <div style="background:#fff; padding:20px; margin-top:20px;">
          <h4 class="n-title">拥有基站</h4>

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
              <td><a href="/base?building=1&energy=1"><?php echo $station_num_1[0]?>（台）</a></td>
              <td><a href="/base?building=1&energy=2"><?php echo $station_num_1[1]?>（台）</a></td>
              <td><a href="/base?building=1&energy=3"><?php echo $station_num_1[2]?>（台）</a></td>
              <td><a href="/base?building=1&energy=4"><?php echo $station_num_1[3]?>（台）</a></td>
              <td><a href="/base?building=1&energy=5"><?php echo $station_num_1[4]?>（台）</a></td>
              <td><a href="/base?building=1&energy=6"><?php echo $station_num_1[5]?>（台）</a></td>
              <td><a href="/base?building=1&energy=7"><?php echo $station_num_1[6]?>（台）</a></td>
              <td><a href="/base?building=1&energy=8"><?php echo $station_num_1[7]?>（台）</a></td>
            </tr>
            <tr>
              <th>板房</th>
             <td><a href="/base"><?php echo $station_num_2[0]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num_2[1]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num_2[2]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num_2[3]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num_2[4]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num_2[5]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num_2[6]?>（台）</a></td>
            <td><a href="/base"><?php echo $station_num_2[7]?>（台）</a></td>

            </tr>
          </table>
        </div>

        <div style="background:#fff; padding:20px; margin-top:20px; margin-bottom:40px;">
          <h4 class="n-title">故障告警
            <a href="#" class="warning-ico-area">
              <span class="glyphicon glyphicon-bell"></span>
              <span class="badge badge-purple"><?php echo $warning_num_total?></span>
            </a>
          </h4>
          <table class="table table-bordered tl-c">
            <tr>
            <th>
              断站
            </th>
            <th>
              室内高温
            </th>
            <th>
              恒温柜高温
            </th>
            <th>
              电表故障
            </th>
            <th>
              功率异常
            </th>
            <th>
              远程关站
            </th>
            <th>
              代理维护按钮
            </th>
            <th>
              空调故障
            </th>
            <th>
              温度感应故障
            </th>
          </tr>
            <tr>
              <td><a href="/warning?type=1"><?php echo $warning_num[0];?></a></td>
              <td><a href="/warning?type=2"><?php echo $warning_num[1];?></a></td>
              <td><a href="/warning?type=3"><?php echo $warning_num[2];?></a></td>
              <td><a href="/warning?type=4"><?php echo $warning_num[3];?></a></td>
              <td><a href="/warning?type=5"><?php echo $warning_num[4];?></a></td>
              <td><a href="/warning?type=6"><?php echo $warning_num[5];?></a></td>
              <td><a href="/warning?type=7"><?php echo $warning_num[6];?></a></td>
              <td><a href="/warning?type=8"><?php echo $warning_num[7];?></a></td>
			  <td><a href="/warning?type=9"><?php echo $warning_num[8];?></a></td>
            </tr>
          </table>
        </div>

    </div>

  </div>
  <script>
	var startTime =  new Date('2015-08-19').getTime();
	var currentTime = new Date().getTime();

	var start_num = (855917 + ((currentTime - startTime) /1000) * 0.03733572).toFixed(2);
	var old_num = 0;
	var timer = 0;
	var cal = function(start_num){
		if(old_num == 0){
		    old_num = start_num;
		    var start_num_mei = (start_num*0.1229/1000).toFixed(2);
			var start_num_co = (start_num*0.785/1000).toFixed(2);
			var start_num_tree = 269;
			$("#start_num").html(start_num);
			$("#start_num_mei").html(start_num_mei);
			$("#start_num_co").html(start_num_co);
		}else{
		   var distance = (start_num - old_num)/10;
		   timer = setInterval(function(){
				if(old_num < start_num){
				   old_num = parseFloat(old_num);
				   old_num += distance;
				   old_num = old_num.toFixed(2);
				   $("#start_num").html(old_num);
				}else{
				   old_num = start_num;
				   $("#start_num").html(start_num);
				   var start_num_mei = (start_num*0.1229/1000).toFixed(2);
				   var start_num_co = (start_num*0.785/1000).toFixed(2);
				   var start_num_tree = 269;
					$("#start_num").html(start_num);
					$("#start_num_mei").html(start_num_mei);
					$("#start_num_co").html(start_num_co);
				   clearInterval(timer);
				}
			},10);
		}
		
		
		$("#start_num_tree").html(start_num_tree);
	}
	cal(start_num);
	setInterval(function(){
		start_num = parseFloat(start_num);
		start_num+=0.19;
		start_num = start_num.toFixed(2);
		cal(start_num);
	},5000);
	
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
