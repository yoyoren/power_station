<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <div class="n-nav-left">
        <ul>
          <li class="current"><a href="/ammeter"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">录入电表 - 我方</span></a></li>
          <li><a href="/ammeter-other"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span><span class="vl-m">录入电表 - 局方</a></li>

        </ul>
      </div>

      <div class="n-right-content">
        <h4 class="tab-to-title">录入电表 - 我方</h4>
        <div class="n-check-area">
          <div class="input-group-item clearfix">
            <span class="name">基站名称：</span>
            <input type="text" class="form-control" required autofocus />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">基站电表采集日期：</span>
            <input type="text" class="form-control form_datetime" value="2014-04" required />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">基站电表采集时间：</span>
            <input type="text" class="form-control form_datetime" value="2014-04" required />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">基站电表采集值：</span>
            <input type="text" class="form-control" required />
          </div>
          <div class="input-group-item tl-r">
            <button type="button" class="btn btn-default">确定</button>
          </div>
        </div>


        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>基站</th>
              <th>采集时间</th>
              <th>度</th>
              <th>本周期计量</th>
              <th>录入人</th>
              <th>录入时间</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>鹤东</td>
              <td>2015-04-12 12:00</td>
              <td>1111</td>
              <td>111</td>
              <td>&nbsp;</td>
              <td>2015-04-14</td>
            </tr>
            <tr>
              <td>鹤东</td>
              <td>2015-04-12 12:00</td>
              <td>1111</td>
              <td>111</td>
              <td>&nbsp;</td>
              <td>2015-04-14</td>
            </tr>
            <tr>
              <td>鹤东</td>
              <td>2015-04-12 12:00</td>
              <td>1111</td>
              <td>111</td>
              <td>&nbsp;</td>
              <td>2015-04-14</td>
            </tr>

          </tbody>
        </table>

      </div>

    </div>

  </div>
</body>
<script type="text/javascript">
$(function () {
    $(".form_datetime").datetimepicker({
      format: 'yyyy-mm',
      language: 'cn'
    });

});
</script>
</html>
