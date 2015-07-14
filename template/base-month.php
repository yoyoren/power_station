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

            可选择月份<input size="16" type="text" value="2012-06" readonly class="date-control form-control form_datetime">
            <input type="checkbox" checked="checked" />天气
            <button type="button" class="btn btn-default" style="margin-left:30px;">确定</button>

          </div>
          <table class="table table-bordered">
            <tbody>
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
              <tr>
                <td>5－1 周一</td>
                <td>136.98</td>
                <td>123.28</td>
                <td>13.7</td>
                <td>86</td>
                <td>81.6</td>
                <td>29233.35</td>
                <td>有／无</td>
                <td>28</td>
                <td>16</td>
                <td>阴</td>
                <td>2</td>
              </tr>
              <tr>
                <td>5－2 周二</td>
                <td>136.98</td>
                <td>123.28</td>
                <td>13.7</td>
                <td>86</td>
                <td>81.6</td>
                <td>29233.35</td>
                <td>有／无</td>
                <td>28</td>
                <td>16</td>
                <td>阴</td>
                <td>2</td>
              </tr>
              <tr>
                <td>5－3 周三</td>
                <td>136.98</td>
                <td>123.28</td>
                <td>13.7</td>
                <td>86</td>
                <td>81.6</td>
                <td>29233.35</td>
                <td>有／无</td>
                <td>28</td>
                <td>16</td>
                <td>阴</td>
                <td>2</td>
              </tr>
              <tr>
                <td>5－4 周四</td>
                <td>136.98</td>
                <td>123.28</td>
                <td>13.7</td>
                <td>86</td>
                <td>81.6</td>
                <td>29233.35</td>
                <td>有／无</td>
                <td>28</td>
                <td>16</td>
                <td>阴</td>
                <td>2</td>
              </tr>

            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/datepicker/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
$(function () {
    $(".form_datetime").datetimepicker({
      format: 'yyyy-mm',
      language: 'cn'
    });

});
    </script>
</html>
