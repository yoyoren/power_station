<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <?php include ('include/nav_base.php')?>
	  <script>$('#nav_base_2').addClass('current');</script>

      <div class="n-right-content">
        <h4 class="tab-to-title">日报数据</h4>
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
          <div class="n-check-area tl-r" style="padding:0 20px;">

            请选择日期：<input size="16" type="text" readonly class="date-control form-control form_datetime vl-m" id="query_date">
            <button type="button" class="btn btn-default" id="query_button">确定</button>
            <div class="btn-group" style="margin-left:40px;">
              <button type="button" class="btn btn-default" id="prev_day">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="vl-m">前一天</span>
              </button>
              <button type="button" class="btn btn-default" id="next_day">
                <span class="vl-m">后一天</span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              </button>
            </div>
          </div>
          <p class="table-title" style="display:none;"><b>成就</b></p>
          <table class="table table-bordered" style="display:none;">
            <tbody>
              <tr>
                <td>&nbsp;</td>
                <td>当日</td>
                <td>当月</td>
                <td>累计</td>
              </tr>
              <tr>
                <td>节能</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>总能耗</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>

          <div id="container_device" class="data-container" style="min-width: 310px; height: 300px;">
			数据加载中...
		  </div>

          <div id="container" class="data-container"  style="min-width: 310px; height: 400px;"></div>

          <div id="container2" class="data-container"  style="min-width: 310px; height: 400px;"></div>
        </div>
      </div>

    </div>
  </div>
</body>

<script src="/static/src/js/highchart/highcharts.js"></script>
<script src="/static/src/js/highchart/modules/exporting.js"></script>
<script src="/static/src/js/datepicker/bootstrap-datetimepicker.js"></script>
<script>
window.data = <?php echo json_encode($data);?>
</script>
<script>
$(function () {
	window.currentTime = window.data.current_date;
    $(".form_datetime").datetimepicker({
      format: 'yyyy-mm-dd',
      language: 'cn',
	  autoclose:true,
	  minView:3
    });

	var refresh = function(time){
		$('#loading_tip').show();
		time = new Date(time).getTime()/1000;
		time = time - 8* 60 *60;
		window.currentTime = time;
		$get('/station/oneday',{
			id:location.href.split('/').pop(),
			time:window.currentTime
		},function(d){
			$('#container_device').html('数据加载中...');
			window.data = d.data;
			renderPage();
		});
	}
	$('#query_button').click(function(){
		var time = $('#query_date').val();
		if(!time){
		   return;
		}
		refresh(time);
	});

	$('#prev_day').click(function(){
		window.currentTime -= 24* 60 *60;
		refresh(window.currentTime);
	});

	$('#next_day').click(function(){
		window.currentTime += 24* 60 *60;
		refresh(window.currentTime);
	});


	var renderPage = function(){
		var time = [];
		var colse_status = [];
		var fan_status = [];
		var air_1_status = [];
		var air_2_status = [];
		for(var i=0;i<window.data['power_dc'].length;i++){
			window.data['power_dc'][i] = parseInt(window.data['power_dc'][i]);
			window.data['power_all'][i] = parseInt(window.data['power_all'][i]);
			window.data['temp_inside'][i] = parseFloat(window.data['temp_inside'][i]);
			window.data['temp_outside'][i] = parseFloat(window.data['temp_outside'][i]);
			window.data['temp_air_1'][i] = parseFloat(window.data['temp_air_1'][i]);
			window.data['temp_air_2'][i] = parseFloat(window.data['temp_air_2'][i]);
			window.data['temp_cabint'][i] = parseFloat(window.data['temp_cabint'][i]);
			var _t = window.data['time'][i];
			_t = _t*1000;
			_t = new Date(_t);
			time.push(_t.getHours() + ':' +_t.getMinutes());

			if(window.data['temp_air_2_status'][i] == '1'){
			   colse_status.push(null);
			   fan_status.push(null);
			   air_1_status.push(null);
			   air_2_status.push(3);
			   continue;
			}

			if(window.data['temp_air_1_status'][i] == '1'){
			   colse_status.push(null);
			   fan_status.push(null);
			   air_1_status.push(3);
			   air_2_status.push(null);
			   continue;
			}

			if(window.data['temp_fan_status'][i] == '1'){
			   colse_status.push(null);
			   fan_status.push(3);
			   air_1_status.push(null);
			   air_2_status.push(null);
			   continue;
			}

			colse_status.push(3);
			fan_status.push(null);
			air_1_status.push(null);
			air_2_status.push(null);
		}
		for(var key in window.data){
			try{
				window.data[key] =  window.data[key].reverse();
			}catch(ex){

			}
		}
		window.step = parseInt(window.data.power_all.length / 20);
		time = time.reverse();
		colse_status = colse_status.reverse();
		fan_status = fan_status.reverse();
		air_1_status = air_1_status.reverse();
		air_2_status = air_2_status.reverse();

		 //设备开启状态
		$('#container_device').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: '设备启动状态图'
			},
			colors:[
					'#5cab1c',//全关
					'#21aed1',//风机
					'#ed8e28',//一个空调
					'#ff4400' //两个空调
			],
			xAxis: {
				categories: time,
				labels: {
				  step:window.step
				}
			},
      yAxis: {
            tickPositions: [0, 3, 5, 7],
            min: 0,
            max:7,
            labels: {
              enabled: false
            },
            title: {
                text: ''
            }
        },
			tooltip: {
				// pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
				pointFormat: '当前启动状态是：<b><span style="color:{series.color}">{series.name}</span></b><br/>',
				shared: true
			},
			plotOptions: {
				column: {
					stacking: 'normal'
				}
			},
			series: [{
				name: '全关',
				data: colse_status
			}, {
				name: '风机',
				data: fan_status}, {
				name: '一个空调',
				data: air_1_status}, {
				name: '二个空调',
				data: air_2_status}]
		});

		$('#container').highcharts({
			chart: {
				type: 'area'
			},
			title: {
				text: '基站总功率和DC功率'
			},
			colors:[
				'#4989c4',
				'#333'
			],
			xAxis: {
				categories: time,
				labels: {
				  step:window.step
				}
			},
			yAxis: {
				title: {
					text: ''
				},
				labels: {
					formatter: function () {
						return this.value / 1000 + 'k';
					},
					step:2
				}
			},
			credits: {
				enabled: false
			},
			plotOptions: {
				area: {
					marker: {
						enabled: false,
						symbol: 'circle',
						radius: 1,
						states: {
							hover: {
								enabled: true
							}
						}
					}
				}
			},
			series: [ {
				name: '总功率',
				data: window.data['power_all']
			},{
				name: 'DC功率',
				data: window.data['power_dc']
			}]
		});


		$('#container2').highcharts({
			chart: {
				type: 'spline'
			},
			title: {
				text: '温度',
				x: -20 //center
			},
			xAxis: {
				categories: time,
				minorTickLength : 20,
				labels: {
				  step:window.step
				}
			},
			yAxis: {
				title: {
					text: '温度 (°C)'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}],
				plotBands: [{ // Light air
					from: 38,
					to: 38.2,
					color: 'rgb(239, 88, 89)',
					label: {
						text: '警戒线',
						style: {
							color: 'black'
						}
					}
				}]
			},
			tooltip: {
				valueSuffix: '°C'
			},

			series: [{
				name: '室内温度',
				data:  window.data['temp_inside']}, {
				name: '室外温度',
				data: window.data['temp_outside']}, {
				name: '恒温柜温度',
				data:  window.data['temp_cabint']}, {
				name: '空调一温度',
				data: window.data['temp_air_1']}, {
				name: '空调二温度',
				data:window.data['temp_air_2']
				}]
		});

		$('#loading_tip').hide();
	}

	setTimeout(function(){
		renderPage();
	},100);




/*
  var startDate = new Date(window.data.time[window.data.time.length - 1] * 1000);
  var startYear = startDate.getFullYear();
  var startMonth = startDate.getMonth();
  var startDay = startDate.getDate();
  $('#container').highcharts({
      chart: {
          type: 'spline'
      },
      title: {
          text: '基站总功率和DC功率'
      },
      xAxis: {
          type: 'datetime'
      },
      yAxis: {
          title: {
              text: 'Wind speed (m/s)'
          },
          min: 0,
          minorGridLineWidth: 0,
          gridLineWidth: 0,
          alternateGridColor: null,
          plotBands: [{ // Light air
              from: 0.3,
              to: 1.5,
              color: 'rgba(68, 170, 213, 0.1)',
              label: {
                  text: 'Light air',
                  style: {
                      color: '#606060'
                  }
              }
          }, { // Light breeze
              from: 1.5,
              to: 3.3,
              color: 'rgba(0, 0, 0, 0)',
              label: {
                  text: 'Light breeze',
                  style: {
                      color: '#606060'
                  }
              }
          }, { // Gentle breeze
              from: 3.3,
              to: 5.5,
              color: 'rgba(68, 170, 213, 0.1)',
              label: {
                  text: 'Gentle breeze',
                  style: {
                      color: '#606060'
                  }
              }
          }, { // Moderate breeze
              from: 5.5,
              to: 8,
              color: 'rgba(0, 0, 0, 0)',
              label: {
                  text: 'Moderate breeze',
                  style: {
                      color: '#606060'
                  }
              }
          }, { // Fresh breeze
              from: 8,
              to: 11,
              color: 'rgba(68, 170, 213, 0.1)',
              label: {
                  text: 'Fresh breeze',
                  style: {
                      color: '#606060'
                  }
              }
          }, { // Strong breeze
              from: 11,
              to: 14,
              color: 'rgba(0, 0, 0, 0)',
              label: {
                  text: 'Strong breeze',
                  style: {
                      color: '#606060'
                  }
              }
          }, { // High wind
              from: 14,
              to: 15,
              color: 'rgba(68, 170, 213, 0.1)',
              label: {
                  text: 'High wind',
                  style: {
                      color: '#606060'
                  }
              }
          }]
      },
      tooltip: {
          valueSuffix: ' m/s'
      },
      plotOptions: {
          spline: {
              lineWidth: 4,
              states: {
                  hover: {
                      lineWidth: 5
                  }
              },
              marker: {
                  enabled: false
              },
              pointInterval: 60000, // one hour
              pointStart: Date.UTC(startYear, startMonth, startDay, 0, 0, 0)
          }
      },
      series: [{
          name: 'Hestavollane',
          data: window.data['power_all']

      }, {
          name: 'Voll',
          data:  window.data['power_dc']
      }]
      ,
      navigation: {
          menuItemStyle: {
              fontSize: '10px'
          }
      }
  });

return;
*/
});
    </script>
</html>
