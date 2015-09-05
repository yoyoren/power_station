<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <?php include ('include/nav_base.php')?>
	  <script>$('#nav_base_0').addClass('current');</script>

      <div class="n-right-content">
        <h4 class="tab-to-title">当前状态
          <a href="#" class="warning-ico-area">
            <span class="glyphicon glyphicon-bell"></span>
            <span class="badge badge-purple" ><? echo $warning_num;?></span>
          </a>
        </h4>
        <div class="current-name-area clearfix">
          <span class="vl-m fl-l name">
            <b><?php echo $station['info']->stationName;?></b> 基站
            <span style="color:#ff4400; padding:4px; border-radius:4px; margin-left:10px; ">
			<?php if($online){echo '[正常在线]';} else {echo '[离线]';}?>
			</span>
            <span>最新采集时间：<span id="last_time"></span> </span>
			<script>
				var _d = new Date();
				$('#last_time').html(_d.getFullYear()+ '-' + (_d.getMonth()+1)+ '-' + _d.getDate() 
				+ ' ' + _d.getHours()+':'+ _d.getMinutes());
			</script>
          </span>

          <div class="fl-r">
            <?php include ('include/base_top_switch.php')?>
          </div>

        </div>

        <div class="nav-tabs-content">
          <p class="table-title"><b>天气信息</b></p>
          <div class="weather-container clearfix">
            <div class="img-con fl-l">
              <img class="" src="/static/src/img/ic-tianqi.png" width="60px;" />
            </div>
            <div class="table-con fl-l">
              <table class="table">
                <tr>
                  <td>
                    高温<br/>
                    <b><?php echo $weather->h_tmp == 327.68? 'N/A':$weather->h_tmp;?>℃</b>
                  </td>
                  <td>
                    低温<br/>
                    <b><?php echo $weather->l_tmp;?>℃</b>
                  </td>
                  <td>
                    日照<br/>
                    <b><?php echo $weather->weather;?></b>
                  </td>
                  <td>
                    风力<br/>
                    <b><?php echo $weather->WS;?></b>
                  </td>
                </tr>

              </table>
            </div>

          </div>

          <p class="table-title"><b>温湿度</b></p>
          <div class="clearfix">
            <div class="n-wendu-item">

              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge" data="30" id="inside_display"></div>
              </div>

              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num" id="inside_tmp">0℃</p>
                <p>室内温度</p>
              </div>

            </div>

            <div class="n-wendu-item">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge" data="20"  id="outside_display"></div>
              </div>
              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num" id="outside_tmp">0℃</p>
                <p>室外温度</p>
              </div>

            </div>

            <div class="n-wendu-item">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge" data="40" id="cabint_display"></div>
              </div>
              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num" id="cabint_tmp">0℃</p>
                <p>恒温柜温度</p>
              </div>

            </div>

            <div class="n-wendu-item">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge"  id="air_1_display" data="50"></div>
              </div>
              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num" id="air_1_tmp">0℃</p>
                <p>空调一温度</p>
              </div>

            </div>

            <div class="n-wendu-item">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge"  id="air_2_display" data="80"></div>
              </div>
              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num" id="air_2_tmp">0℃</p>
                <p>空调二温度</p>
              </div>
            </div>
			
			<div class="n-wendu-item">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge"  id="inside_hum_display" data="80"></div>
              </div>
              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num" id="inside_hum">0℃</p>
                <p>室内湿度</p>
              </div>
            </div>
          </div>
          <hr/>

          <p class="table-title"><b>设备状态</b></p>
          <div class="clearfix">
            <div class="n-status-item" id="device_fan">
              <p>新风</p>
              <!-- <img src="img/ic-off.png"/> -->
              <p class="de-status open" style="display:none">工作</p>
			  <p class="de-status onclose" style="display:none">关闭</p>
            </div>
            <div class="n-status-item" id="device_air_1">
              <p>空调1</p>
              <!-- <img src="img/ic-off.png"/> -->
              <p class="de-status open" style="display:none">工作</p>
			  <p class="de-status onclose" style="display:none">关闭</p>
            </div>
            <div class="n-status-item"  id="device_air_2">
              <p>空调2</p>
              <!-- <img src="img/ic-on.png"/> -->
              <p class="de-status open" style="display:none">工作</p>
			  <p class="de-status onclose" style="display:none">关闭</p>
            </div>
            <div class="n-status-item"  id="device_cabint">
              <p>恒温柜</p>
              <p class="de-status open" style="display:none">工作</p>
			  <p class="de-status onclose" style="display:none">关闭</p>
            </div>
          </div>

          <hr/>

          <p class="table-title"><b>负载状态</b></p>
            <div class="n-wendu-item" style="height:auto;">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-gauge2" data="34"></div>
              </div>
              <div style="padding:0 0 0 20px;;">
                <p class="num">34A</p>
                <p>基准能耗</p>
              </div>
            </div>

            <div class="n-wendu-item" style="height:auto;">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-gauge2" data="39"></div>
              </div>
              <div style="padding:0 0 0 20px;;">
                <p class="num">39A</p>
                <p>当前能耗</p>
              </div>
            </div>
          </div><!-- 能耗结束 -->
        </div>
      </div>
    </div>
  </div>
</body>
<script src="/static/src/js/devexpress-web-14.1/js/globalize.min.js"></script>
<script src="/static/src/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
<script>window.device_status = <?php echo json_encode($status)?></script>
<script>
jQuery(document).ready(function($)
{
  var draw_1 = function(el,value){
	el.dxCircularGauge({
      scale: {
        startValue: 0,
        endValue: 100,
        majorTick: {
          tickInterval: 25
        }
      },
      rangeContainer: {
        palette: 'pastel',
        width: 3,
        ranges: [
          { startValue: 0, endValue: 25, color: "#68b828" },
          { startValue: 25, endValue: 50, color: "#5daec3" },
          { startValue: 50, endValue: 75, color: "#eac350" },
          { startValue: 75, endValue: 100, color: "#d5080f" },
        ],
      },
      value: value,
      valueIndicator: {
        offset: 10,
        color: 'red',
        type: 'rectangleNeedle',
        spindleSize: 12
      }
    });
  }
  draw_1($('#inside_display'),window.device_status.temperatureInside);
  if(window.device_status.temperatureInside == 327.68){
	$('#inside_tmp').html('N/A');
  }else{
	$('#inside_tmp').html(window.device_status.temperatureInside+'℃');
  }
  
  
  draw_1($('#outside_display'),window.device_status.temperatureOutside);
  if(window.device_status.temperatureOutside == 327.68){
	$('#outside_tmp').html('N/A');
  }else{
	$('#outside_tmp').html(window.device_status.temperatureOutside+'℃');
  }
 
  
  draw_1($('#air_1_display'),window.device_status.temperatureAircondition1);
  if(window.device_status.temperatureAircondition1 == 327.68){
	$('#air_1_tmp').html('N/A');
  }else{
	$('#air_1_tmp').html(window.device_status.temperatureAircondition1+'℃');
  }
  
  
  draw_1($('#air_2_display'),window.device_status.temperatureAircondition2);
  if(window.device_status.temperatureAircondition2 == 327.68){
	$('#air_2_tmp').html('N/A');
  }else{
	$('#air_2_tmp').html(window.device_status.temperatureAircondition2+'℃');
  }
  
  draw_1($('#inside_hum_display'),window.device_status.wetInside);
  
  if(window.device_status.wetInside == 255){
	$('#inside_hum').html('N/A');
  }else{
	$('#inside_hum').html(window.device_status.wetInside + '%');
  }
  
  //$('#outside_hum').html(window.device_status.wetOutside  + '%');
  // CPU Usage Gauge
  
  draw_1($('#cabint_display'),window.device_status.temperatureCabinet);
  if(window.device_status.temperatureCabinet == 327.68){
	$('#cabint_tmp').html('N/A');
  }else{
	$('#cabint_tmp').html(window.device_status.temperatureCabinet+'℃');
  }
  
  if(window.device_status.deviceStatus1 == '1'){
	$("#device_air_1").find('.open').show();
  }else{
	$("#device_air_1").find('.onclose').show();
  }
  
  if(window.device_status.deviceStatus2 == '1'){
	$("#device_air_2").find('.open').show();
  }else{
	$("#device_air_2").find('.onclose').show();
  }
  
  if(window.device_status.deviceStatusFan == '1'){
	$("#device_fan").find('.open').show();
  }else{
	$("#device_fan").find('.onclose').show();
  }
  
  if(window.device_status.deviceStatusCabinet == '1'){
	$("#device_cabint").find('.open').show();
  }else{
	$("#device_cabint").find('.onclose').show();
  }

  var dataItemPower =$(".cpu-gauge2");
  for(var i =0; i<dataItemPower.length;i++){
    var data = $(dataItemPower[i]).attr('data');
    $(dataItemPower[i]).dxCircularGauge({
    //var dataValue = $(this).attr('data');
      scale: {
        startValue: 0,
        endValue: 100,
        majorTick: {
          tickInterval: 25
        }
      },
      rangeContainer: {
        palette: 'pastel',
        width: 3,
        ranges: [
          { startValue: 0, endValue: 25, color: "#68b828" },
          { startValue: 25, endValue: 50, color: "#68b828" },
          { startValue: 50, endValue: 75, color: "#68b828" },
          { startValue: 75, endValue: 100, color: "#d5080f" },
        ],
      },
      value: data,
      valueIndicator: {
        offset: 10,
        color: 'red',
        type: 'rectangleNeedle',
        spindleSize: 12
      }
    });

  }


});

</script>
</html>
