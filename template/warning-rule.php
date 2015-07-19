<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <?php include ('include/nav_warning.php')?>

<style type="text/css">
.n-check-item{width: auto; margin-right: 20px;}
.n-check-item .name{width: auto;}

.data-name p,
.data-data p{height: 20px; margin-bottom: 4px;}
</style>
      <div class="n-right-content">
        <h4 class="tab-to-title">告警策略管理</h4>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>告警类型</th>
              <th>分析</th>
              <th>实现策略</th>
              <th>备注</th>
              <th>预留</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>断站</td>
              <td>无数据</td>
              <td>？触发</td>
              <td>5分钟无数据</td>
              <td>时间</td>
            </tr>

            <tr>
              <td>室内高温</td>
              <td>实时</td>
              <td>&nbsp;</td>
              <td>室内温度大于36度</td>
              <td>温度</td>
            </tr>

            <tr>
              <td>恒温柜高温</td>
              <td>实时</td>
              <td>&nbsp;</td>
              <td>恒温柜温度大于28度</td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td>电表故障</td>
              <td>无数据</td>
              <td>?</td>
              <td>无电表数据（总／d c）</td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td>电表故障</td>
              <td>实时</td>
              <td>&nbsp;</td>
              <td>总能耗小于DC</td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td style="background:#eee">功率异常</td>
              <td>实时</td>
              <td>&nbsp;</td>
              <td>功率大于前10条平均值的15%</td>
              <td>比例 + 10条</td>
            </tr>

            <tr>
              <td style="background:#eee">远程关站</td>
              <td>实时 + 计数</td>
              <td>&nbsp;</td>
              <td>故障标志</td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td style="background:#eee">代理维护按钮</td>
              <td>实时</td>
              <td>&nbsp;</td>
              <td>故障标志</td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td>空调故障</td>
              <td>实时</td>
              <td>&nbsp;</td>
              <td>空调温度大于20度（开）</td>
              <td>温度</td>
            </tr>

            <tr>
              <td>温度感应故障</td>
              <td>无数据</td>
              <td>？</td>
              <td>5分钟未提供数据</td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td>温度感应故障</td>
              <td>实时</td>
              <td>&nbsp;</td>
              <td>超过范围（－10－70）</td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>

      </div>

    </div>

  </div>
</body>
</html>
