<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>
    <div class="n-container">

      <div class="n-nav-left">
        <ul>
          <li><a href="/ammeter"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">录入电表 - 我方</span></a></li>
          <li class="current"><a href="/ammeter-other"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span><span class="vl-m">录入电表 - 局方</a></li>

        </ul>
      </div>

      <div class="n-right-content">
        <h4 class="tab-to-title">录入电表 - 局方</h4>
        <div class="n-check-area">
          <div class="input-group-item clearfix">
            <span class="name">项目名称：</span>
            <select>
              <option>上海联通</option>
              <option>北京移动</option>
            </select>
          </div>
          <div class="input-group-item clearfix">
            <span class="name">基站名称：</span>
            <input type="text" class="form-control" required autofocus />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">基站电表采集时间：</span>
            <input type="text" class="form-control form_datetime" readonly value="2015-04-05 15:30" required />
          </div>
          <div class="input-group-item tl-r">
            <button type="button" class="btn btn-default">确定</button>
          </div>
          <hr/>
          <p style="color:#ff4400;">点了上面的确定以后，才能出下面的查询结果，跟进结果来对数据和选择是否录入。</p>
          <div class="input-group-item clearfix">
            <span class="name">我方电表采集值：</span>
            <span class="name">3456565</span>
          </div>
          <div class="input-group-item clearfix">
            <span class="name">基站电表采集值：</span>
            <input type="text" class="form-control" required value="3456565" />
          </div>
          <div class="input-group-item tl-r">
            <button type="button" class="btn btn-default">确定</button>
          </div>
        </div>

        <p class="table-title"><b>电表记录</b></p>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>基站</th>
              <th>采集时间</th>
              <th>度</th>
              <th>录入人</th>
              <th>录入时间</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>鹤东</td>
              <td>2015-04-12 12:00</td>
              <td>1111</td>
              <td>&nbsp;</td>
              <td>2015-04-14</td>
            </tr>
            <tr>
              <td>鹤东</td>
              <td>2015-04-12 12:00</td>
              <td>1111</td>
              <td>&nbsp;</td>
              <td>2015-04-14</td>
            </tr>
            <tr>
              <td>鹤东</td>
              <td>2015-04-12 12:00</td>
              <td>1111</td>
              <td>&nbsp;</td>
              <td>2015-04-14</td>
            </tr>

          </tbody>
        </table>

      </div>

    </div>

  </div>
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/datepicker/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
$(function () {
    $(".form_datetime").datetimepicker({
      language: 'cn'
    });

});
</script>
</html>
