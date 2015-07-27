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
        <div class="current-name-area clearfix">
          <span class="vl-m fl-l name"><b>001</b>基站</span>

          <div class="fl-r">
            <div class="btn-group">
              <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="vl-m">前一个基站</span>
              </button>
              <button type="button" class="btn btn-default">
                <span class="vl-m">后一个基站</span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              </button>
            </div>
          </div>

        </div>

        <div class="nav-tabs-content">
          <div class="n-check-area tl-r">

            请选择日期<input size="16" type="text" value="2012-06-15 14:45" readonly class="date-control form-control form_datetime">
            <button type="button" class="btn btn-default">确定</button>
            <br/>
            <br/>
            <div class="btn-group">
              <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="vl-m">前一天</span>
              </button>
              <button type="button" class="btn btn-default">
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

          <div id="container_device" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          <hr>
          <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          <hr>
          <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
    $(".form_datetime").datetimepicker({
      format: 'yyyy-mm-dd hh:ii',
      language: 'cn'
    });

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
            categories: ['00:00', '00:10', '00:20', '00:30', '00:40', '00:50', '01:00', '01:10', '01:20', '01:30', '01:40', '01:50', '02:00', '02:10', '02:20', '02:30', '02:40', '02:50', '03:00', '03:10','03:20', '03:30', '03:40', '03:50', '04:00', '04:10', '04:20', '04:30', '04:40', '04:50', '05:00', '05:10', '05:20', '05:30', '05:40', '05:50', '06:00', '06:10', '06:20', '06:30','06:40', '06:50', '07:00', '07:10', '07:20', '07:30', '07:40', '07:50', '08:00', '08:10', '08:20', '08:30', '08:40', '08:50', '09:00', '09:10', '09:20', '09:30', '09:40', '09:50','10:00', '10:10', '10:20', '10:30', '10:40', '10:50', '11:00', '11:10', '11:20', '11:30', '11:40', '11:50', '12:00', '12:10', '12:20', '12:30', '12:40', '12:50', '13:00', '13:10','13:20', '13:30', '13:40', '13:50', '14:00', '14:10', '14:20', '14:30', '14:40', '14:50', '15:00', '15:10', '15:20', '15:30', '15:40', '15:50', '16:00', '16:10', '16:20', '16:30'],
            labels: {
              step:12
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'percent'
            }
        },
        series: [{
            name: '全关',
            data: [0,0,0,0,0,10,10,10,10,0,0,0,0,0,10,10,10,10,0,0,0,0,0,10,10,10,10,0,0,0,0,0,10,10,10,10,0,0,0,0,0,10,10,10,10,0,0,0,0,0,10,10,10,10,0,0,0,0,0,10,10,10,10]
        }, {
            name: '风机',
            data: [10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0]
        }, {
            name: '一个空调',
            data: [0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0,0,0,0,10,10,0,0,0,0]
        }, {
            name: '二个空调',
            data: [0,0,10,0,0,0,0,0,0,0,0,10,0,0,0,0,0,0,0,0,10,0,0,0,0,0,0,0,0,10,0,0,0,0,0,0,0,0,10,0,0,0,0,0,0,0,0,10,0,0,0,0,0,0,0,0,10,0,0,0,0,0,0]
        }]
    });

	var time = [];
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
	}
    $('#container').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: '基站总功率和DC功率'
        },
        xAxis: {
            categories: time,
			labels: {
              step:12
            }
        },
        yAxis: {
            title: {
                text: ' '
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
        series: [{
            name: '总功率',
            data: window.data['power_all']
        }, {
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
			labels: {
              step:12
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
});
    </script>
</html>
