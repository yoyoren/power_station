<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <div class="n-nav-left">
        <ul>
          <li class="current"><a href="weihu-note.html"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">工作日志</span></a></li>
          <li><a href="weihu-mes.html"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span><span class="vl-m">天气信息</a></li>

        </ul>
      </div>

      <div class="n-right-content">
        <h4 class="tab-to-title">工作日志</h4>
        <div class="n-check-area">
          <div class="n-check-item2">
            <span class="name">日期</span>
            <input type="text" class="form-control form_datetime" value="2015-02-12" />
          </div>
          <div class="n-check-item2">
            <span class="name">工作类型</span>
            <select>
              <option>修改</option>
            </select>
          </div>
          <div class="n-check-item2">
            <span class="name">操作者</span>
            <select>
              <option>操作A</option>
            </select>
          </div>
          <button type="button" class="btn btn-default">确定</button>
        </div>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>记录时间</th>
              <th>鹤东</th>
              <th>工作类型</th>
              <th>修改项目</th>
              <th>原来</th>
              <th>当前</th>
              <th>操作者</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2015-04-12 12:00</td>
              <td>鹤东</td>
              <td>修改</td>
              <td>经度</td>
              <td>30</td>
              <td>31</td>
              <td>行山</td>
            </tr>
            <tr>
              <td>2015-04-12 12:00</td>
              <td>鹤东</td>
              <td>抄表</td>
              <td>-</td>
              <td>-</td>
              <td>31897</td>
              <td>行山</td>
            </tr>
            <tr>
              <td>2015-04-12 12:00</td>
              <td>鹤东</td>
              <td>创建</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>行山</td>
            </tr>

          </tbody>
        </table>

        <div class="tl-r">
          <p>每页显示15条信息，查看更多请翻页。</p>
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
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
      format: 'yyyy-mm-dd',
      language: 'cn'
    });

});
</script>
</html>
