<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <?php include ('include/nav_base.php')?>
	  <script>$('#nav_base_3').addClass('current');</script>

      <div class="n-right-content">
        <h4 class="tab-to-title">月报数据</h4>
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
          <div class="n-check-area tl-r" >
            <div class="btn-group" style="display:none">
              <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="vl-m">上一个月</span>
              </button>
              <button type="button" class="btn btn-default">
                <span class="vl-m">下一个月</span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              </button>
            </div>
            可选择月份<input size="16" type="text" id="date_input" readonly class="date-control form-control form_datetime">
            <input type="checkbox" checked="checked"  style="display:none"/>
            <button type="button" class="btn btn-default" style="margin-left:30px;" id="query_button">确定</button>

          </div>
		 
          <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          <hr>
          <table class="table table-bordered">
			 <thead>
              <tr>
                <th>日期</th>
                <th>总能耗</th>
                <th>DC能耗</th>
                <th>AC能耗</th>
                <th>初始化负载</th>
                <th>实际负载</th>
                <th>电表（0点）</th>
                <th>故障标志</th>
                <th>高温</th>
                <th>低温</th>
                <th>日照</th>
                <th>风力</th>
              </tr>
			  </thead>
			  <tbody id="data_container">
			  </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
</body>

<script type="text/javascript" src="/static/src/js/highchart/highcharts.js"></script>
<script type="text/javascript" src="/static/src/js/highchart/modules/exporting.js"></script>
<script type="text/javascript" src="/static/src/js/datepicker/bootstrap-datetimepicker.js"></script>
<script>
window.station = <? echo json_encode($station)?>
</script>
<script>
$(function () {
	var currentMonth = new Date((new Date()).getFullYear() +'-' + ((new Date()).getMonth()+1)).getTime()/1000;
	var renderPage = function(month){
		$('#loading_tip').show();
		var time = currentMonth - 8*3600;
		$get('/station/onemonth/ration',{
			time : time,
			id: window.station.info.stationId
		},function(d){
			var all_off = 45.0;
			var fan = 26.5;
			var one_open = 16.0;
			var two_open = 12.5;
			if(d.code == 0){
				all_off = parseFloat(((d.data.all_off/d.data.all) * 100).toFixed(2));
				fan = parseFloat(((d.data.fan_open/d.data.all) * 100).toFixed(2));
				one_open = parseFloat(((d.data.one_open/d.data.all) * 100).toFixed(2));
				two_open = parseFloat(((d.data.two_open/d.data.all) * 100).toFixed(2));
			}

			$('#container').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				colors:[
						'#5cab1c',//全关
						'#21aed1',//风机
						'#ed8e28',//一个空调
						'#ff4400' //两个空调
				],
				title: {
					text: '设备状态启动比例'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',

						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							}
						}
					}
				},
				series: [{
					type: 'pie',
					name: '当月启动比例',
					data: [
						['全关',   all_off],
						['风机',       fan],
						['一个空调',    one_open],
						{
							name: '两个空调',
							y: two_open,
							sliced: true,
							selected: true
						}

					]
				}]
			});
		});
		var time = currentMonth;
			
		$get('/station/month/read',{
			year:(new Date()).getFullYear(),
			month:((new Date()).getMonth()+1),
			id: window.station.info.stationId
		},function(d){
				var data = d.data ||[];
				var html = '';
				for(var i=0;i<data.length;i++){
					var _d = data[i];
					var tempatureHigh = (Math.random() * 50).toFixed(2);
					if(tempatureHigh<30){
					   tempatureHigh = 21;
					}
					tempatureLow = tempatureHigh - 10;
					html += '<tr>\
								<td>'+getNowFormatDate( _d.start_time * 1000)+'</td>\
								<td>'+(_d.energyAll*1000/10733).toFixed(2)+'度</td>\
								<td>'+(_d.energyDc*1000/10733).toFixed(2)+'度</td>\
								<td>'+((_d.energyAll*1000/10733).toFixed(2) - (_d.energyDc*1000/10733).toFixed(2)).toFixed(2)+'度</td>\
								<td>'+window.station.energy.overload+'A</td>\
								<td>'+((_d.energyDc*1000/10733)*1000*0.85/(53.5*24)).toFixed(2)+'A</td>\
								<td>'+(_d.energyAllBegin*1000/10733).toFixed(2)+'度</td>\
								<td>无</td>\
								<td>32</td>\
								<td>26</td>\
								<td>晴</td>\
								<td>无风</td>\
							  </tr>';
				}
				$('#data_container').html(html);
				$('#loading_tip').hide();
		});
		
		$get('/weather/month/get',{
			time:month,
			province:window.station.info.stationProvince,
			city:window.station.info.stationCity
		},function(d){
			if(d.code == 0){
				return;
				var data = d.data ||[];
				var html = '';
				for(var i=0;i<data.length;i++){
					var _d = data[i];
					html += '<tr>\
								<td>'+new Date( _d.createTime * 1000)+'</td>\
								<td>136.98</td>\
								<td>123.28</td>\
								<td>13.7</td>\
								<td>86</td>\
								<td>81.6</td>\
								<td>29233.35</td>\
								<td>有／无</td>\
								<td>'+_d.temperatureHigh+'</td>\
								<td>'+_d.temperatureLow+'</td>\
								<td>'+_d.weather+'</td>\
								<td>'+_d.wind+'</td>\
							  </tr>';
				}
				$('#data_container').html(html);
			}
		});
	}
	renderPage(currentMonth);
	$('#query_button').click(function(){
		var month = $('#date_input').val();
		if(month){
			//东8区要减去8小时
			month = new Date(month).getTime()/1000;
			month = month - 8*3600;
			renderPage(month);
		}
	});
	
    $(".form_datetime").datetimepicker({
      format: 'yyyy-mm',
      language: 'cn',
	  minView:3,
	  startView:3,
	  autoclose:true
    });

    

});
    </script>
</html>
