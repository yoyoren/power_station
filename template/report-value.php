<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
<link rel="stylesheet" type="text/css" href="/static/src/css/table.css">
  <div class="n-layout">
    <?php include ('include/header.php')?>
    <div class="n-container">
      <?php include ('include/nav_report.php')?>
      <script>$('#nav_report_3').addClass('current');</script>

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
            <span class="name">区县</span>
            <select>
              <option>全部</option>
              <option>浦东</option>
              <option>南汇</option>
            </select>
          </div>
          <div class="n-check-item">
            <span class="name">数据来源</span>
            <select>
              <option>杉实</option>
              <option>联通</option>
            </select>
          </div>
          <button type="button" class="btn btn-default" id="sub_check">确定</button>
        </div>
        <div style="height:100%; overflow:auto; padding-right:20px; display:none;" id="show_table">
          <table class="table table-bordered">
            <tr>
              <th colspan="10">电表核准系数e(数据来源-上海杉实)  (2015年02月01日 - 2015年02月28日) </th>
            </tr>
            <tr>
              <td class="th">1</td>
              <td class="th">2</td>
              <td class="th">3</td>
              <td class="th">4</td>
              <td class="th">5</td>
              <td class="th">6</td>
              <td class="th">7</td>
              <td class="th">8.0000</td>
              <td class="th">9</td>
              <td class="th">10</td>
            </tr>
            <tr>
              <td>基站名称</td>
              <td>上次拍照抄表时间T1(精确到分钟)</td>
              <td>本次拍照抄表时间T2(精确到分钟)</td>
              <td>电表T1时间读数H1</td>
              <td>电表T2时间读数H2</td>
              <td>上次抄表数据K1</td>
              <td>本次抄表数据K2</td>
              <td>用电量比值系数<hr/>
              (K2-K1)/(H2-H1)
              </td>
              <td>电表核准系数e</td>
              <td>备注(偏差过大，个案处理)</td>
            </tr>
            <tr>
              <td>老港</td>
              <td>10/28/14 17:20</td>
              <td>2/12/15 14:16</td>
              <td>34866.11</td>
              <td>48293.54</td>
              <td>1180</td>
              <td>14659</td>
              <td>1.0038</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>康天</td>
              <td>12/11/14-14:14</td>
              <td>2/12/15-13:01</td>
              <td>17470.28</td>
              <td>22815.52</td>
              <td>114834</td>
              <td>120191</td>
              <td>1.0022</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>周祝</td>
              <td>12/25/14-14:10</td>
              <td>2/12/15-11:27</td>
              <td>55486</td>
              <td>64738.75</td>
              <td>271759.7</td>
              <td>280940</td>
              <td>0.9922</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>瓦屑</td>
              <td>9/29/14-9:18</td>
              <td>2/12/15-10:40</td>
              <td>0.74</td>
              <td>18044.95</td>
              <td>51550.9</td>
              <td>69654</td>
              <td>1.0033</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>川奉</td>
              <td>12/31/14-16:02</td>
              <td>2/12/15-10:14</td>
              <td>3666.65</td>
              <td>5799.42</td>
              <td>123894</td>
              <td>126011</td>
              <td>0.9926</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>瓦南</td>
              <td>11/11/14-16:25</td>
              <td>2/12/15-10:09</td>
              <td>6366.27</td>
              <td>14826.16</td>
              <td>166187.9</td>
              <td>174597</td>
              <td>0.9940</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>新港</td>
              <td>12/25/14-16:27</td>
              <td>2/11/15-9:30</td>
              <td>16670.29</td>
              <td>24898.32</td>
              <td>40906.4</td>
              <td>48566</td>
              <td>0.9309</td>
              <td>0.93</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="23" class="leave-mes">中国联合网络通信有限公司上海市南汇区分公司签字： <span style="margin-left:80px;">杉实环境科技（上海）有限公司签字：</span></td>
            </tr>
          </table>

          <table class="table table-bordered">
            <tr>
              <th colspan="10">电表核准系数e(数据来源-用能公司)  (2015年02月01日 - 2015年02月28日) </th>
            </tr>
            <tr>
              <td class="th">1</td>
              <td class="th">2</td>
              <td class="th">3</td>
              <td class="th">4</td>
              <td class="th">5</td>
              <td class="th">6</td>
              <td class="th">7</td>
              <td class="th">8.0000</td>
              <td class="th">9</td>
              <td class="th">10</td>
            </tr>
            <tr>
              <td>基站名称</td>
              <td>上次拍照抄表时间T1(精确到分钟)</td>
              <td>本次拍照抄表时间T2(精确到分钟)</td>
              <td>电表T1时间读数H1</td>
              <td>电表T2时间读数H2</td>
              <td>上次抄表数据K1</td>
              <td>本次抄表数据K2</td>
              <td>用电量比值系数<hr/>
              (K2-K1)/(H2-H1)
              </td>
              <td>电表核准系数e</td>
              <td>备注(偏差过大，个案处理)</td>
            </tr>
            <tr>
              <td>老港</td>
              <td>10/28/14 17:20</td>
              <td>2/12/15 14:16</td>
              <td>34866.11</td>
              <td>48293.54</td>
              <td>1180</td>
              <td>14659</td>
              <td>1.0038</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>康天</td>
              <td>12/11/14-14:14</td>
              <td>2/12/15-13:01</td>
              <td>17470.28</td>
              <td>22815.52</td>
              <td>114834</td>
              <td>120191</td>
              <td>1.0022</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>周祝</td>
              <td>12/25/14-14:10</td>
              <td>2/12/15-11:27</td>
              <td>55486</td>
              <td>64738.75</td>
              <td>271759.7</td>
              <td>280940</td>
              <td>0.9922</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>瓦屑</td>
              <td>9/29/14-9:18</td>
              <td>2/12/15-10:40</td>
              <td>0.74</td>
              <td>18044.95</td>
              <td>51550.9</td>
              <td>69654</td>
              <td>1.0033</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>川奉</td>
              <td>12/31/14-16:02</td>
              <td>2/12/15-10:14</td>
              <td>3666.65</td>
              <td>5799.42</td>
              <td>123894</td>
              <td>126011</td>
              <td>0.9926</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>瓦南</td>
              <td>11/11/14-16:25</td>
              <td>2/12/15-10:09</td>
              <td>6366.27</td>
              <td>14826.16</td>
              <td>166187.9</td>
              <td>174597</td>
              <td>0.9940</td>
              <td>1</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>新港</td>
              <td>12/25/14-16:27</td>
              <td>2/11/15-9:30</td>
              <td>16670.29</td>
              <td>24898.32</td>
              <td>40906.4</td>
              <td>48566</td>
              <td>0.9309</td>
              <td>0.93</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="23" class="leave-mes">中国联合网络通信有限公司上海市南汇区分公司签字： <span style="margin-left:80px;">杉实环境科技（上海）有限公司签字：</span></td>
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
