<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">
      <?php include ('include/nav_base.php')?>
	  <script>$('#nav_base_1').addClass('current');</script>

      <div class="n-right-content">
        <h4 class="tab-to-title">基础信息</h4>
        <div class="current-name-area clearfix">
          <span class="vl-m fl-l name"><b><?php echo $station->stationId; ?>（<?php echo $station->stationName; ?>）</b>基站</span>

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

          <p class="table-title clearfix">
            <a href="jizhan-man-edit.html" class="btn btn-default fl-r">编辑当前基站</a>
          </p>

          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="td-to-th">基站名称</td>
                <td><?php echo $station->stationName; ?></td>
                <td class="td-to-th">站点类型</td>
                <td><?php echo $station->stationType; ?></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">基站编号</td>
                <td>cu-sh-pd-0001</td>
                <td class="td-to-th">用能方站号</td>
                <td>NH10113</td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>


              <tr>
                <td class="td-to-th">项目</td>
                <td>上海联通</td>
                <td class="td-to-th">工程分期</td>
                <td>shcu1</td>
                <td class="td-to-th">建站时间</td>
                <td>2014-9-30</td>
              </tr>

              <tr>
                <td class="td-to-th">省</td>
                <td>上海</td>
                <td class="td-to-th">城市</td>
                <td>上海</td>
                <td class="td-to-th">区县</td>
                <td>浦东</td>
              </tr>

              <tr>
                <td class="td-to-th">地址</td>
                <td>鹤东村沙东路13号</td>
                <td class="td-to-th">经度</td>
                <td>&nbsp;</td>
                <td class="td-to-th">纬度</td>
                <td>&nbsp;</td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">供电类型</td>
                <td>市政供电／物业供电</td>
                <td class="td-to-th">电价收费方</td>
                <td>供电局收费／物业收费／托收</td>
                <td class="td-to-th">建筑类型</td>
                <td>板房／砖墙</td>
              </tr>

              <tr>
                <td class="td-to-th">电价</td>
                <td>0.91</td>
                <td class="td-to-th">分成比例</td>
                <td>70%</td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">局方电表号</td>
                <td>0330303003q</td>
                <td class="td-to-th">我方电表号</td>
                <td>cush0003</td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">空调数量</td>
                <td>2</td>
                <td class="td-to-th">空调温感</td>
                <td>2</td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">室外温感</td>
                <td>有</td>
                <td class="td-to-th">室内温感</td>
                <td>有</td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">进风机型号</td>
                <td>厂家型号</td>
                <td class="td-to-th">出风机型号</td>
                <td>厂家型号</td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">恒温柜数量</td>
                <td>1</td>
                <td class="td-to-th">蓄电池柜</td>
                <td>厂家型号</td>
                <td class="td-to-th">蓄电池空调</td>
                <td>厂家型号</td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">负载（A）</td>
                <td>78</td>
                <td class="td-to-th">能耗类型（A）</td>
                <td>30-40</td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">SIM卡号</td>
                <td>14567895678</td>
                <td class="td-to-th">ECU编号</td>
                <td>1100119657</td>
                <td class="td-to-th">ECU扩展编号</td>
                <td>厂家型</td>
              </tr>


            </tbody>
          </table>

        </div>

      </div>

    </div>

  </div>
</body>
</html>
