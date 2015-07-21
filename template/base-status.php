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
        <h4 class="tab-to-title">当前状态</h4>
        <div class="current-name-area clearfix">
          <span class="vl-m fl-l name">
            <b><?php echo $station['info']->stationSeriseCode;?></b>基站
            <span style="background:#ff4400; color:#fff; padding:4px; border-radius:4px; margin-left:10px; ">正常在线</span>
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
          <p class="table-title"><b>温湿度</b></p>
          <div class="clearfix">
            <div class="n-wendu-item">
              <img src="/static/src/img/ic-wendu2.png" class="fl-l" style="height:120px;" />
              <div class="fl-l" style="padding:30px 0 0 20px;;">
                <p>室内温度</p>
                <p class="num">27.9℃</p>
              </div>

            </div>

            <div class="n-wendu-item">
              <img src="/static/src/img/ic-wendu2.png" class="fl-l" style="height:120px;" />
              <div class="fl-l" style="padding:30px 0 0 20px;;">
                <p>室外温度</p>
                <p class="num">27.9℃</p>
              </div>

            </div>

            <div class="n-wendu-item">
              <img src="/static/src/img/ic-wendu2.png" class="fl-l" style="height:120px;" />
              <div class="fl-l" style="padding:30px 0 0 20px;;">
                <p>恒温柜温度</p>
                <p class="num">27.9℃</p>
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
          </div>

          <hr/>
          <div class="clearfix">
            <div class="">
              <p class="table-title"><b>能耗状态</b></p>
              <div class="clearfix">
                <div class="n-dian-biao-status-item">
                  <img src="/static/src/img/ic-nh2.png" />
                  <p>基准能耗</p>
                  <p class="num">34A</p>

                </div>
                <div class="n-dian-biao-status-item">
                  <img src="/static/src/img/ic-nh2.png"/>
                  <p>当前能耗</p>
                  <p class="num">29A</p>

                </div>
              </div>
            </div>
            <hr/>

            <div class="" style="display:none">
              <p class="table-title"><b>电表状态</b></p>
              <div class="clearfix">
                <div class="n-dian-biao-status-item">
                  <img src="/static/src/img/ic-dianbiao2.png" />
                  <p>智能电表</p>
                  <p class="num">31302.85</p>

                </div>
                <div class="n-dian-biao-status-item">
                  <img src="/static/src/img/ic-dianbiao2.png"/>
                  <p>基站电表</p>
                  <p class="num">151440.31</p>

                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>
</body>
</html>
