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

            选择日期<input size="16" type="text" value="2012" style="width:180px;" readonly class="date-control form-control form_datetime">

            <button type="button" class="btn btn-default" style="margin-left:30px;">确定</button>
            <div style="margin-top:10px;">
              <input type="checkbox" class="checkbox-item" checked="checked" />温度
              <input type="checkbox" class="checkbox-item" checked="checked" />湿度
              <input type="checkbox" class="checkbox-item" checked="checked" />功率
              <input type="checkbox" class="checkbox-item" checked="checked" />开关
              <input type="checkbox" class="checkbox-item" checked="checked" />电表
            </div>

          </div>
          <table class="table table-bordered">
            <tbody>
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
                <td>每分钟更新一次</td>
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
      language: 'cn'
    });

});
    </script>
</html>
