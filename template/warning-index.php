<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <?php include ('include/nav_warning.php')?>
      <script>$('#nav_warning_0').addClass('current');</script>

		<style type="text/css">
		.n-check-item{width: auto; margin-right: 20px;}
		.n-check-item .name{width: auto;}

		.data-name p,
		.data-data p{height: 20px; margin-bottom: 4px;}
		</style>
      <div class="n-right-content">
        <h4 class="tab-to-title">故障列表
        <a href="/warning/fullscreen" class="btn btn-default">全屏显示</a>
        </h4>
        <div class="n-check-area">
          <div class="n-check-item">
            <select id="warning_year">
				<option value="0">请选择</option>
				<option value="2015">2015</option>
			</select>
            <span class="name">年</span>
          </div>
          <div class="n-check-item">
			<select id="warning_month">
				<option value="0">请选择</option>
				<option value="1">01</option>
				<option value="2">02</option>
				<option value="3">03</option>
				<option value="4">04</option>
				<option value="5">05</option>
				<option value="6">06</option>
				<option value="7">07</option>
				<option value="8">08</option>
				<option value="9">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
            <span class="name">月</span>
          </div>
          <div class="n-check-item">
            <span class="name">告警状态</span>
            <select  id="warning_status">
              <option value="1">open</option>
              <option value="0">close</option>
              <option value="-1">全部</option>
            </select>
          </div>
          <div class="n-check-item">
            <span class="name">告警类型</span>
            <select id="warning_type">
				<?php
					foreach($WARNING_TYPE as $key=>$val){
						echo '<option value="'.$key.'">'.$val.'</option>';
					}
				?>
            </select>
          </div>
          <button type="button" class="btn btn-default" id="query_button">确定</button>
        </div>

		<style type="text/css">
		.status{color: #ff4400;}
		</style>
        <table class="table table-bordered tl-c">
          <tr>
            <td>
              断站
            </td>
            <td>
              室内高温
            </td>
            <td>
              恒温柜高温
            </td>
            <td>
              电表故障
            </td>
            <td>
              功率异常
            </td>
            <td>
              远程关站
            </td>
            <td>
              代理维护按钮
            </td>
            <td>
              空调故障
            </td>
            <td>
              温度感应故障
            </td>
          </tr>
          <tr>
            <td><b><?php echo $warning_num[0]?></b></td>
            <td><b><?php echo $warning_num[1]?></b></td>
            <td><b><?php echo $warning_num[2]?></b></td>
            <td><b><?php echo $warning_num[3]?></b></td>
            <td><b><?php echo $warning_num[4]?></b></td>
            <td><b><?php echo $warning_num[5]?></b></td>
            <td><b><?php echo $warning_num[6]?></b></td>
            <td><b><?php echo $warning_num[7]?></b></td>
            <td><b><?php echo $warning_num[8]?></b></td>
          </tr>
        </table>

        <div class="tl-r">
          <ul class="pagination" id="page_container">
          </ul>
        </div>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>告警开始时间</th>
              <th>告警结束时间</th>
              <th>站点</th>
              <th>告警类型</th>
              <th>参数值</th>
              <th>告警状态</th>
            </tr>
          </thead>
          <tbody id="container">
          </tbody>
        </table>

      </div>

    </div>

  </div>
  <script>
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


	var pageSize = 20;
	var currentPage = 0;
	var total = 0;
	var totalPage;
	var renderPage = function(init){
		$get('/warning/list',{
			page:currentPage,
			pagesize:pageSize
		},function(d){
			if(d.code == 0){
				if(init){
					total = parseInt(d.data.count);
					totalPage = Math.floor(total/pageSize) + 1;
					var pageHTML = '';
					for(var i=1;i<=totalPage;i++){
						pageHTML +='<li data-index="'+(i-1)+'"><a href="#">'+i+'</a></li>';
					}
					$('#page_container').html(pageHTML);
				}
				var data = d.data.data;
				var html = '';
				for(var i=0;i<data.length;i++){
					var _d = data[i];
					html += '<tr>\
							  <td>'+getNowFormatDate(_d.createTime*1000)+'</td>\
							  <td>'+getNowFormatDate(_d.updateTime*1000)+'</td>\
							  <td><a href="/base/status/'+_d.stationId+'">'+_d.stationName+'</a></td>\
							  <td>\
								<div class="data-name">\
								  <p>'+WARNING_MSG[_d.warningType]+'</p>\
								</div>\
							  </td>\
							  <td>\
								<div class="data-data">\
								  <p>'+_d.warningDesc+'</p>\
								</div>\
							  </td>\
							  <td class="status">'+(_d.warningStatus=='1'?'open':'close')+'</td>\
							</tr>';
				}
				$('#container').html(html);
			}
		});
	
	}
	renderPage(true);
	
	$('#page_container').delegate('li','click',function(){
		var page = $(this).data('index');
		currentPage = page;
		renderPage();
	});
	
	$('#query_button').click(function(){
		var create_time = -1;
		if($('#warning_year').val()!='0' && $('#warning_month').val()!='0'){
			create_time = new Date($('#warning_year').val() + '-' + $('#warning_month').val()).getTime();
		}
		$get('/warning/query',{
			start:0,
			pagesize:pageSize,
			warning_type:$('#warning_type').val(),
			warning_status:$('#warning_status').val(),
			create_time:create_time
		},function(d){
			if(d.code == 0){
				if(d.data.length){
				
				}else{
					alert('没有查询到相关数据');
				}
			}
		});
	});
  </script>
</body>
</html>
