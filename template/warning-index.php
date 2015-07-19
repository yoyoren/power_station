<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <?php include ('include/nav_warning.php')?>
      <script>$('#nav_warning_0').addClass('current');</script>

<style type="text/css">
.n-check-item{width: auto; margin-right: 20px;}
.n-check-item .name{width: auto;}

.data-name p,
.data-data p{height: 20px; margin-bottom: 4px;}
</style>
      <div class="n-right-content">
        <h4 class="tab-to-title">故障列表</h4>
        <div class="n-check-area">
          <div class="n-check-item">
            <select><option>2015</option></select>
            <span class="name">年</span>
          </div>
          <div class="n-check-item">
            <select><option>06</option></select>
            <span class="name">月</span>
          </div>
          <div class="n-check-item">
            <span class="name">告警状态</span>
            <select>
              <option>open</option>
              <option>close</option>
              <option>全部</option>
            </select>
          </div>
          <div class="n-check-item">
            <span class="name">告警类型</span>
            <select>
              <option>远程关站</option>
              <option>室内高温</option>
              <option>全部</option>
            </select>
          </div>
          <button type="button" class="btn btn-default">确定</button>
        </div>

<style type="text/css">
.status{color: #ff4400;}
</style>
        <div class="tl-r">
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

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>告警开始时间</th>
              <th>告警结束时间</th>
              <th>站点</th>
              <th>告警类型</th>
              <th>参数值</th>
              <th>告警状态</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td><a href="jizhanxiangqing.html">鹤东</a></td>
              <td>
                <div class="data-name">
                  <p>温度感应故障</p>
                </div>
              </td>
              <td>
                <div class="data-data">
                  <p>无数据／过低／过高</p>

                </div>
              </td>
              <td class="status">open</td>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <td><a href="jizhanxiangqing.html">鹤东</a></td>
              <td>
                <div class="data-name">
                  <p>断站</p>
                </div>
              </td>
              <td>
                <div class="data-data">
                  <p>5分钟无数据发送</p>
                </div>
              </td>
              <td class="status">open</td>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <td><a href="jizhanxiangqing.html">鹤南</a></td>
              <td>
                <div class="data-name">
                  <p>室内高温</p>
                </div>
              </td>
              <td>
                <div class="data-data">
                  <p>38</p>
                </div>
              </td>
              <td class="status">open</td>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <td><a href="jizhanxiangqing.html">鹤东</a></td>
              <td>
                <div class="data-name">
                  <p>断站</p>
                  <p>室内高温</p>
                  <p>恒温柜高温</p>
                  <p>电表故障</p>
                  <p>功率异常</p>
                  <p>远程关站</p>
                  <p>代理维护按钮</p>
                  <p>空调故障</p>
                  <p>温度感应故障</p>
                </div>
              </td>
              <td>
                <div class="data-data">
                  <p></p>
                  <p>38</p>
                  <p>32</p>
                  <p>无总能耗／无DC能耗／总能耗小于DC</p>
                  <p></p>
                  <p></p>
                  <p>被打开</p>
                  <p>23</p>
                  <p>无数据／过低／过高</p>

                </div>
              </td>
              <td class="status">open</td>
            </tr>
          </tbody>
        </table>

      </div>

    </div>

  </div>
</body>
</html>
