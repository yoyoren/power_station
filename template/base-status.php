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
            <span class="badge badge-purple">7</span>
          </a>
        </h4>
        <div class="current-name-area clearfix">
          <span class="vl-m fl-l name">
            <b><?php echo $station['info']->stationSeriseCode;?></b>基站
            <span style="color:#ff4400; padding:4px; border-radius:4px; margin-left:10px; ">[正常在线]</span>
            <span>最新采集时间：2015-04-23 10:23:11 </span>

          </span>

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
                    <b>33℃</b>
                  </td>
                  <td>
                    低温<br/>
                    <b>23℃</b>
                  </td>
                  <td>
                    日照<br/>
                    <b>多云</b>
                  </td>
                  <td>
                    风力<br/>
                    <b>2级</b>
                  </td>
                </tr>

              </table>
            </div>

          </div>

          <p class="table-title"><b>温湿度</b></p>
          <div class="clearfix">
            <div class="n-wendu-item">

              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge" data="30"></div>
              </div>

              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num">27.9℃</p>
                <p>室内温度</p>
              </div>

            </div>

            <div class="n-wendu-item">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge" data="20"></div>
              </div>
              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num">27.9℃</p>
                <p>室外温度</p>
              </div>

            </div>

            <div class="n-wendu-item">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge" data="40"></div>
              </div>
              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num">27.9℃</p>
                <p>恒温柜温度</p>
              </div>

            </div>

            <div class="n-wendu-item">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge" data="50"></div>
              </div>
              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num">27.9℃</p>
                <p>空调一温度</p>
              </div>

            </div>

            <div class="n-wendu-item">
              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge" data="80"></div>
              </div>
              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num">27.9℃</p>
                <p>空调二温度</p>
              </div>

            </div>

            <div class="n-wendu-item">

              <div id="other-stats" style="min-height: 160px">
                <div class="cpu-usage-gauge" data="80"></div>
              </div>

              <div class="fl-l" style="padding:0 0 0 20px;;">
                <p class="num">80%</p>
                <p>室内湿度</p>
              </div>

            </div>

          </div>
          <hr/>

          <p class="table-title"><b>设备状态</b></p>
          <div class="clearfix">
            <div class="n-status-item">
              <p>新风</p>
              <!-- <img src="img/ic-off.png"/> -->
              <p class="de-status">关闭</p>
            </div>
            <div class="n-status-item">
              <p>空调1</p>
              <!-- <img src="img/ic-off.png"/> -->
              <p class="de-status">关闭</p>
            </div>
            <div class="n-status-item">
              <p>空调2</p>
              <!-- <img src="img/ic-on.png"/> -->
              <p class="de-status open">工作</p>
            </div>
            <div class="n-status-item">
              <p>恒温柜</p>
              <p class="de-status open">工作</p>
            </div>
          </div>

          <hr/>
          <p class="table-title"><b>能耗状态</b></p>
          <div class="clearfix">
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

<script src="/static/src/js/jquery.js"></script>
<script src="/static/src/js/devexpress-web-14.1/js/globalize.min.js"></script>
<script src="/static/src/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($)
{
  // CPU Usage Gauge
  var dataItem =$(".cpu-usage-gauge");
  for(var i =0; i<dataItem.length;i++){
    var data = $(dataItem[i]).attr('data');
    $(dataItem[i]).dxCircularGauge({
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
          { startValue: 25, endValue: 50, color: "#5daec3" },
          { startValue: 50, endValue: 75, color: "#eac350" },
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
