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
            categories: ['00:00', '00:20', '00:40', '01:00', '01:20', '01:40', '02:00', '02:20', '02:40', '03:00', '03:20', '03:40', '04:00',  '04:20',  '04:40','05:00',  '05:20',  '05:40', '06:00', '06:20', '06:40', '07:00', '07:20', '07:40', '08:00',  '08:20', '08:40', '09:00', '09:20','09:40','10:00', '10:20', '10:40', '11:00','11:20', '11:40', '12:00', '12:20', '12:40', '13:00', '13:20', '13:40', '14:00', '14:20', '14:40','15:00', '15:20', '15:40', '16:00', '16:20','16:40', '17:00','17:20', '17:40', '18:00', '18:20', '18:40', '19:00', '19:20', '19:40', '20:00', '20:20', '20:40', '21:00', '21:20', '21:40', '22:00', '22:20', '22:40', '23:00' ,'23:20',  '23:40','24:00'],
            labels: {
              step:12
            }
        },
        yAxis: {
            min: 0,
            max:10,
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
            data: [null,null,null,null,null,6,6,6,6,null,null,null,null,null,6,6,6,6,null,null,null,null,null,6,6,6,6,null,null,null,null,null,6,6,6,6,null,null,null,null,null,6,6,6,6,null,null,null,null,null,6,6,6,6,null,null,null,null,null,6,6,6,6,6,6,6,6,6,6,6,6,6,6,]
        }, {
            name: '风机',
            data: [6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null]
        }, {
            name: '一个空调',
            data: [null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null,null,null,null,6,6,null,null,null,null]
        }, {
            name: '二个空调',
            data: [null,null,6,null,null,null,null,null,null,null,null,6,null,null,null,null,null,null,null,null,6,null,null,null,null,null,null,null,null,6,null,null,null,null,null,null,null,null,6,null,null,null,null,null,null,null,null,6,null,null,null,null,null,null,null,null,6,null,null,null,null,null,null]
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
        colors:[
            '#4989c4',
            '#333'
        ],
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
