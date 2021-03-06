<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
<link rel="stylesheet" type="text/css" href="/static/src/css/table.css">
  <div class="n-layout">
    <?php include ('include/header.php')?>
    <div class="n-container">
      <?php include ('include/nav_report.php')?>
      <script>$('#nav_report_1').addClass('current');</script>

      <div class="n-right-content" style="padding:74px 20px 20px 0; overflow:hidden;">
        <div class="n-check-area report-check-area">
          <div class="n-check-item">
            <span class="name">项目</span>
            <select><option>上海联通</option></select>
          </div>
          <div class="n-check-item">
            年份与月份
            <input type="text" class="form-control form_datetime" readonly="" value="2015-04" required="" style="width:80px;">
          </div>
          <div class="n-check-item">
            <span class="name">基站类型</span>
            <select>
              <option>砖墙</option>
              <option>板房</option>
              <option>基准</option>
              <option>节能</option>
            </select>
          </div>
          <button type="button" class="btn btn-default" id="sub_check">确定</button>
        </div>
        <div style="height:100%; overflow:auto; padding-right:20px; display:none;" id="show_table">
          <table class="table table-bordered">
            <tr>
              <th colspan="16">表二   砖墙基准站能耗标准值S</th>
            </tr>
            <tr>
              <td class="th" colspan="4">分公司：上海联通 </td>
              <td class="th" colspan="12">时间：2015年02月01日 - 2015年02月28日</td>
            </tr>
            <tr>
              <td class="th" colspan="6">系统数据</td>
              <td class="th" colspan="4">异常能耗修正值</td>
              <td class="th">归中</td>
              <td class="th" colspan="3">电表核准系数e</td>
              <td class="th">有效</td>
              <td class="th">基准站能耗标准值</td>
            </tr>
            <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td>8</td>
              <td>9</td>
              <td>10</td>
              <td>11</td>
              <td>12</td>
              <td>13</td>
              <td>14</td>
              <td>有效</td>
              <td>15</td>
            </tr>
            <tr>
              <td>档位区分</td>
              <td>基准站名称</td>
              <td>基站负载(A)</td>
              <td>基准站用电量核算起始度数(每月1日0点)</td>
              <td>基准站用电量核算结束度数(每月最后一天24点)</td>
              <td>基准站月用电量(度)</td>
              <td>能耗异常情况是否存在</td>
              <td>表四异常能耗修正(度)</td>
              <td>修正后能耗(度)</td>
              <td>&nbsp;</td>
              <td>归中修正后基准站用电量（度）</td>
              <td>表三电表偏差系数e</td>
              <td>电表是否需要核准</td>
              <td>电表修正后月能耗（度）</td>
              <td>最终使用基准站标识</td>
              <td>基准站能耗标准值（度）</td>
            </tr>
            <tr>
              <td rowspan="3">40-50A</td>
              <td>马厂(南)</td>
              <td>42</td>
              <td>25360.42</td>
              <td>27173.62</td>
              <td class="has-bg2">1813.2</td>
              <td class="has-bg">1813.2</td>
              <td>否</td>
              <td>&nbsp;</td>
              <td class="has-bg2">1813</td>
              <td class="has-bg">1813</td>
              <td>&nbsp;</td>
              <td class="has-bg2">1991.08</td>
              <td class="has-bg">1991</td>
              <td>1</td>
              <td>否</td>
              <td class="has-bg2">1991</td>
              <td class="has-bg">1991</td>
              <td class="has-bg" rowspan="3">2131</td>
              <td class="has-bg">0.93</td>
              <td>放弃</td>
              <td class="has-bg" rowspan="3">2202</td>
              <td class="has-bg2" rowspan="3">2201.52</td>
            </tr>
            <tr>
              <td>博兴(浦)</td>
              <td>45</td>
              <td>10445.91</td>
              <td>12378.93</td>
              <td class="has-bg2">1933.02</td>
              <td class="has-bg">1933.02</td>
              <td>是</td>
              <td>260.61</td>
              <td class="has-bg2">2193.63</td>
              <td class="has-bg">2193.63</td>
              <td>&nbsp;</td>
              <td class="has-bg2">2193.63</td>
              <td class="has-bg">2193.63</td>
              <td>1</td>
              <td>否</td>
              <td class="has-bg2">2193.63</td>
              <td class="has-bg">2193.63</td>
              <td class="has-bg">1.03</td>
              <td>有效</td>
            </tr>
            <tr>
              <td>大石(浦)</td>
              <td>44</td>
              <td>9231.62</td>
              <td>11381.74</td>
              <td class="has-bg2">2150.12</td>
              <td class="has-bg">2150.12</td>
              <td>否</td>
              <td>&nbsp;</td>
              <td class="has-bg2">2150</td>
              <td class="has-bg">2150</td>
              <td>&nbsp;</td>
              <td class="has-bg2">2209.41</td>
              <td class="has-bg">2209</td>
              <td>1</td>
              <td>否</td>
              <td class="has-bg2">2209</td>
              <td class="has-bg">2209</td>
              <td class="has-bg">1.04</td>
              <td>有效</td>
            </tr>
            <tr>
                <td colspan="16" style="text-align:left;">
                    备注：① 1A负载能耗 = 0.05 千瓦／时*24小时*当月天数*1.5PUE／0.85；<br/>
                     ② 70A+档位归中负载为该档位同建筑类型所有节能站的负载平均值(91.78A)
                </td>
            </tr>
            <tr>
                <td colspan="16" class="leave-mes">中国联合网络通信有限公司上海分公司签字：</td>
            </tr>
            <tr>
                <td colspan="16" class="leave-mes">杉实环境科技（上海）有限公司签字：</td>
            </tr>
          </table>
        </div>
      </div>


    </div>
  </div>
</body>
<script type="text/javascript" src="/static/src/js/datepicker/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
$('.form_datetime').datetimepicker( {
  format: 'yyyy-mm',
  weekStart: 1,
  autoclose: true,
  startView: 3,
  minView: 3,
  forceParse: false,
  language: 'cn'
});

$('#sub_check').bind('click',function(){
  $('#show_table').show();
})
</script>
</html>
