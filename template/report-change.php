<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
<link rel="stylesheet" type="text/css" href="/static/src/css/table.css">
  <div class="n-layout">
    <?php include ('include/header.php')?>
    <div class="n-container">
      <?php include ('include/nav_report.php')?>
      <script>$('#nav_report_4').addClass('current');</script>

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
            <span class="name">类型</span>
            <select>
              <option>基准站</option>
              <option>节能站</option>
            </select>
          </div>
          <div class="n-check-item">
            <span class="name">基站名称</span>
            <select>
              <option>00001</option>
              <option>00002</option>
            </select>
          </div>
          <button type="button" class="btn btn-default" id="sub_check">确定</button>
        </div>
        <div style="height:100%; overflow:auto; padding-right:20px; display:none;" id="show_table">
          <table class="table table-bordered">
            <tr>
              <th colspan="8">表四   异常能耗修正   2015年02月01日 - 2015年02月28日 </th>
            </tr>
            <tr>
              <td class="th" colspan="5">站名：博兴</td>
              <td class="th" colspan="3">类型：基准站</td>
            </tr>
            <tr>
              <td class="th">1</td>
              <td class="th">2</td>
              <td class="th">3</td>
              <td class="th">4</td>
              <td class="th">5</td>
              <td class="th">6</td>
              <td class="th">7</td>
              <td class="th">8</td>
            </tr>
            <tr>
              <td>日期</td>
              <td>负载</td>
              <td>能耗状态</td>
              <td>能耗值(度)</td>
              <td>能耗异常情况说明</td>
              <td>修正前日能耗(度)</td>
              <td>修正后日能耗值(度)<hr/>
              基准站填自己平均正常能耗，<hr/>
              节能站填同档位基准站
              </td>
              <td>附件<hr/>
               异常能耗故障记录，<hr/>
               联通邮件或签字确认
              </td>
            </tr>
            <tr>
              <td>05日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.36</td>
              <td>不修正</td>
              <td>78.36</td>
              <td>78.36</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>06日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.52</td>
              <td>不修正</td>
              <td>78.52</td>
              <td>78.52</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>07日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.6</td>
              <td>不修正</td>
              <td>78.6</td>
              <td>78.6</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>08日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.55</td>
              <td>不修正</td>
              <td>78.55</td>
              <td>78.55</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>09日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.42 </td>
              <td>不修正</td>
              <td>78.42 </td>
              <td>78.42 </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>10日</td>
              <td>45</td>
              <td>正常</td>
              <td>79.15</td>
              <td>不修正</td>
              <td>79.15</td>
              <td>79.15</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>11日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.72</td>
              <td>不修正</td>
              <td>78.72</td>
              <td>78.72</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>12日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.31</td>
              <td>不修正</td>
              <td>78.31</td>
              <td>78.31</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>13日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.46</td>
              <td>不修正</td>
              <td>78.46</td>
              <td>78.46</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>14日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.43</td>
              <td>不修正</td>
              <td>78.43</td>
              <td>78.43</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>15日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.75</td>
              <td>不修正</td>
              <td>78.75</td>
              <td>78.75</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>16日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.57</td>
              <td>不修正</td>
              <td>78.57</td>
              <td>78.57</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>17日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.4</td>
              <td>不修正</td>
              <td>78.4</td>
              <td>78.4</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>18日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.65</td>
              <td>不修正</td>
              <td>78.65</td>
              <td>78.65</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>19日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.43</td>
              <td>不修正</td>
              <td>78.43</td>
              <td>78.43</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>20日</td>
              <td>45</td>
              <td>正常</td>
              <td>77.77</td>
              <td>不修正</td>
              <td>77.77</td>
              <td>77.77</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>21日</td>
              <td>45</td>
              <td>正常</td>
              <td>77.71</td>
              <td>不修正</td>
              <td>77.71</td>
              <td>77.71</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>22日</td>
              <td>45</td>
              <td>正常</td>
              <td>77.57</td>
              <td>不修正</td>
              <td>77.57</td>
              <td>77.57</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>23日</td>
              <td>45</td>
              <td>正常</td>
              <td>77.8</td>
              <td>不修正</td>
              <td>77.8</td>
              <td>77.8</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>24日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.05</td>
              <td>不修正</td>
              <td>78.05</td>
              <td>78.05</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>25日</td>
              <td>45</td>
              <td>正常</td>
              <td>77.85</td>
              <td>不修正</td>
              <td>77.85</td>
              <td>77.85</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>26日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.16</td>
              <td>不修正</td>
              <td>78.16</td>
              <td>78.16</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>27日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.47</td>
              <td>不修正</td>
              <td>78.47</td>
              <td>78.47</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>28日</td>
              <td>45</td>
              <td>正常</td>
              <td>78.57</td>
              <td>不修正</td>
              <td>78.57</td>
              <td>78.57</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align:left;" colspan="3">无故障日能耗日平均值： </td>
              <td colspan="5"><span>78.34</span></td>
            </tr>
            <tr>
              <td>01日</td>
              <td>45</td>
              <td>异常</td>
              <td>2.21</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>2.21</td>
              <td>78.34</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>02日</td>
              <td>45</td>
              <td>异常</td>
              <td>2.27</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>2.27</td>
              <td>78.34</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>03日</td>
              <td>45</td>
              <td>异常</td>
              <td>2.08</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>2.08</td>
              <td>78.34</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>04日</td>
              <td>45</td>
              <td>异常</td>
              <td>46.19</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>46.19</td>
              <td>78.34</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>1933.02</td>
              <td>2193.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"><b>异常能耗修正值：</b></td>
              <td colspan="5"><b>260.61</b></td>
            </tr>
            <tr>
                <td colspan="8" style="text-align:left;">
                    备注：① 基准站异常日能耗 = 本基站正常日能耗的平均值<br/>
                     ② 节能站异常日能耗 = 本档位的基准站平均能耗标准值S/当月天数
                </td>
            </tr>
            <tr>
                <td colspan="8" class="leave-mes">中国联合网络通信有限公司上海分公司浦东新区分公司签字：<span style="margin-left:80px;">杉实环境科技（上海）有限公司签字：</span></td>
            </tr>
          </table>
          <table class="table table-bordered">
            <tr>
              <th colspan="8">表四   异常能耗修正   2015年02月01日 - 2015年02月28日 </th>
            </tr>
            <tr>
              <td class="th" colspan="5">站名：康天</td>
              <td class="th" colspan="3">类型：节能站</td>
            </tr>
            <tr>
              <td class="th">1</td>
              <td class="th">2</td>
              <td class="th">3</td>
              <td class="th">4</td>
              <td class="th">5</td>
              <td class="th">6</td>
              <td class="th">7</td>
              <td class="th">8</td>
            </tr>
            <tr>
              <td>日期</td>
              <td>负载</td>
              <td>能耗状态</td>
              <td>能耗值(度)</td>
              <td>能耗异常情况说明</td>
              <td>修正前日能耗(度)</td>
              <td>修正后日能耗值(度)<hr/>
              <span style="color:red;">基准站填自己平均正常能耗，</span><hr/>
              <span style="color:red;">节能站填同档位基准站</span>
              </td>
              <td>附件<hr/>
               <span style="color:red;">异常能耗故障记录，</span><hr/>
               <span style="color:red;">联通邮件或签字确认</span>
              </td>
            </tr>
            <tr >
              <td>01日</td>
              <td>44</td>
              <td>正常</td>
              <td>82.66</td>
              <td>不修正</td>
              <td>82.66</td>
              <td>82.66</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>02日</td>
              <td>44</td>
              <td>正常</td>
              <td>82.67</td>
              <td>不修正</td>
              <td>82.67</td>
              <td>82.67</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>03日</td>
              <td>44</td>
              <td>正常</td>
              <td>82.81</td>
              <td>不修正</td>
              <td>82.81</td>
              <td>82.81</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>04日</td>
              <td>44</td>
              <td>正常</td>
              <td>82.51</td>
              <td>不修正</td>
              <td>82.51</td>
              <td>82.51</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>05日</td>
              <td>44</td>
              <td>正常</td>
              <td>82.22</td>
              <td>不修正</td>
              <td>82.22</td>
              <td>82.22</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>06日</td>
              <td>44</td>
              <td>正常</td>
              <td>82.29</td>
              <td>不修正</td>
              <td>82.29</td>
              <td>82.29</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>07日</td>
              <td>44</td>
              <td>正常</td>
              <td>83.27</td>
              <td>不修正</td>
              <td>83.27</td>
              <td>83.27</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>08日</td>
              <td>44</td>
              <td>正常</td>
              <td>84.41</td>
              <td>不修正</td>
              <td>84.41</td>
              <td>84.41</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>09日</td>
              <td>44</td>
              <td>正常</td>
              <td>84.11</td>
              <td>不修正</td>
              <td>84.11</td>
              <td>84.11</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>10日</td>
              <td>44</td>
              <td>正常</td>
              <td>84.23</td>
              <td>不修正</td>
              <td>84.23</td>
              <td>84.23</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>11日</td>
              <td>44</td>
              <td>正常</td>
              <td>86.67</td>
              <td>不修正</td>
              <td>86.67</td>
              <td>86.67</td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td style="text-align:left;" colspan="3">无故障日能耗日平均值： </td>
              <td colspan="5">83.44</td>
            </tr>

            <tr >
              <td>12日</td>
              <td>44</td>
              <td>异常</td>
              <td>46.34</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>46.34</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>13日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>14日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>15日</td>
              <td>44</td>
              <td>异常</td>
              <td>0.01</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>0.01</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>16日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>17日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>18日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>19日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>20日</td>
              <td>44</td>
              <td>异常</td>
              <td>0.01</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>0.01</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>21日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>22日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>23日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>24日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>25日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>26日</td>
              <td>44</td>
              <td>异常</td>
              <td>0.01</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>0.01</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>27日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>28日</td>
              <td>44</td>
              <td>异常</td>
              <td>&nbsp;</td>
              <td>市电停电(JZZTDGZ)</td>
              <td>&nbsp;</td>
              <td>78.63</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>964</td>
              <td>2254.56</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"><b>异常能耗修正值：</b></td>
              <td colspan="5"><b>1290</b></td>
            </tr>
            <tr>
                <td colspan="8" style="text-align:left;">
                    备注：① 基准站异常日能耗 = 本基站正常日能耗的平均值<br/>
                     ② 节能站异常日能耗 = 本档位的基准站平均能耗标准值S/当月天数(2201.52/28=78.63)
                </td>
            </tr>
            <tr>
                <td colspan="8" class="leave-mes">中国联合网络通信有限公司上海分公司南汇区分公司签字：<span style="margin-left:80px;">杉实环境科技（上海）有限公司签字：</span></td>
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
