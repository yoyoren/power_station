<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">
	  <?php include ('include/nav_base.php')?>
	  <script>$('#nav_base_5').addClass('current');</script>
      <div class="n-right-content">
        <h4 class="tab-to-title">原始数据</h4>
		<div class="alert alert-success" role="alert" id="loading_tip">
		  <strong></strong> 数据正在加载...
		</div>
        <div class="current-name-area clearfix">
          <span class="vl-m fl-l name"><b><?php echo $station['info']->stationName;?></b> 基站</span>

          <div class="fl-r">
            <?php include ('include/base_top_switch.php')?>
          </div>

        </div>


        <div class="nav-tabs-content">
          <div class="n-check-area tl-r">

            选择日期<input size="16" type="text" style="width:180px;" id="query_date" readonly class="date-control form-control form_datetime">

            <button type="button" class="btn btn-default" style="margin-left:30px;" id="query_button">确定</button>
            <div style="margin-top:10px;display:none">
              <input type="checkbox" class="checkbox-item" checked="checked" />温度
              <input type="checkbox" class="checkbox-item" checked="checked" />湿度
              <input type="checkbox" class="checkbox-item" checked="checked" />功率
              <input type="checkbox" class="checkbox-item" checked="checked" />开关
              <input type="checkbox" class="checkbox-item" checked="checked" />电表
            </div>

          </div>
          <table class="table table-bordered">
            
              <tr>
                <th>采集时间</th>
                <th>室内温度</th>
                <th>室外温度</th>
                <th>恒温柜温度</th>
                <th>空调温度1－8</th>
                <th>湿度室内</th>
                <th>湿度室外</th>
                <th>新风开关</th>
                <th>恒温柜开关</th>
                <th>恒温柜风扇开关</th>
                <th>空调（1-8）开关</th>
                <th>系统开关</th>
                <th>基站总功率</th>
                <th>DC功率</th>
                <th>智能电表总</th>
                <th>智能电表DC</th>
              </tr>

              <tr>
                <td>默认展示最新100条状态</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			<tbody id="data_container">
            </tbody>
          </table>


        </div>
      </div>

    </div>
  </div>
</body>

<script type="text/javascript" src="/static/src/js/datepicker/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
$(function () {
    $(".form_datetime").datetimepicker({
      language: 'cn',
	  format:'yyyy-mm-dd',
	  minView:2,
	  autoclose:true
    });
	var renderData = function(data){
		var html = '';
		for(var i=0;i<data.length;i++){
				var _d = data[i];
				var openStatus = function(status){
					return status ==1?'开':'关';
				}
				
				var valueVaild = function(val){
					return val == 255?'N/A':val;
				}
				html += '<tr>\
							<td>'+getNowFormatDate(_d.createTime * 1000)+'</td>\
							<td>'+_d.temperatureInside+'</td>\
							<td>'+_d.temperatureOutside+'</td>\
							<td>'+_d.temperatureCabinet+'</td>\
							<td>'+[_d.temperatureAircondition1,_d.temperatureAircondition2].join(',')+'</td>\
							<td>'+valueVaild(_d.wetInside)+'</td>\
							<td>'+valueVaild(_d.wetOutside)+'</td>\
							<td>'+openStatus(_d.deviceStatusFan)+'</td>\
							<td>'+openStatus(_d.deviceStatusCabinet)+'</td>\
							<td>'+openStatus(_d.deviceStatusVentilator)+'</td>\
							<td>'+[openStatus(_d.deviceStatus1),openStatus(_d.deviceStatus2)].join(',')+'</td>\
							<td>'+openStatus(_d.workingStatus)+'</td>\
							<td>'+(_d.powerAll*2*0.035986/1000).toFixed(4)+'kw</td>\
							<td>'+(_d.powerDc*2*0.035986/1000).toFixed(4)+'kw</td>\
							<td>'+(_d.energyAll*1000/10733).toFixed(2)+'度</td>\
							<td>'+(_d.energyDc*1000/10733).toFixed(2)+'度</td>\
						</tr>';
			}
			$('#data_container').html(html);
	}
	
	$('#query_button').click(function(){
		var time = $('#query_date').val();
		time = new Date(time).getTime();
		time = time/1000;
		time = time - 8 * 3600;
		$('#loading_tip').show();
		$get('/station/origindata/' + stationId,{
				time:time
			},function(d){
			if(d.code == 0){
				renderData(d.data);
				$('#loading_tip').hide();
			}
		});
	});
	var stationId = location.href.split('/').pop();
	$get('/station/last/origindata/' + stationId,{
		time :-2
	},function(d){
		if(d.code == 0){
		    renderData(d.data);
			$('#loading_tip').hide();
		}
	});

});
    </script>
</html>
