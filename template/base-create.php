<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">
      <?php include ('include/nav_base.php')?>
	  <script>$('#nav_base_8').addClass('current');</script>

      <div class="n-right-content">
        <h4 class="tab-to-title">基站创建</h4>

        <div class="nav-tabs-content">

          <style type="text/css">
          .table-bordered td.td-to-th{vertical-align: middle;}
          </style>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="td-to-th">基站名称</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">站点类型</td>
                <td>
                  <select>
                    <option>基准站</option>
                    <option>节能站</option>
                    <option>预备站</option>
                  </select>
                </td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">基站编号</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">用能方站号</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">项目</td>
                <td>
                  <select>
                    <option>上海联通</option>
                    <option>北京移动</option>
                  </select>
                </td>
                <td class="td-to-th">工程分期</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">建站时间</td>
                <td><input size="16" type="text" value="2012-06-15" readonly class="form-control form_datetime"></td>
              </tr>

              <tr>
                <td class="td-to-th">省</td>
                <td><select><option>上海</option></select></td>
                <td class="td-to-th">城市</td>
                <td><select><option>上海</option></select></td>
                <td class="td-to-th">区县</td>
                <td><select><option>浦东</option></select></td>
              </tr>

              <tr>
                <td class="td-to-th">地址</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">经度</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">纬度</td>
                <td><input type="text" class="form-control" /></td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">供电类型</td>
                <td>
                  <select>
                    <option>市政供电</option>
                    <option>物业供电</option>
                  </select>
                </td>
                <td class="td-to-th">电价收费方</td>
                <td>
                  <select>
                    <option>供电局收费</option>
                    <option>物业收费</option>
                    <option>托收</option>
                  </select>

                </td>
                <td class="td-to-th">建筑类型</td>
                <td>
                  <select>
                    <option>板房</option>
                    <option>砖墙</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td class="td-to-th">电价</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">分成比例</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">局方电表号</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">我方电表号</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">空调数量</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">空调温感</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">室外温感</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">室内温感</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">进风机型号</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">出风机型号</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">恒温柜数量</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">蓄电池柜</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">蓄电池空调</td>
                <td><input type="text" class="form-control" /></td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">负载（A）</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">能耗类型（A）</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">SIM卡号</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">ECU编号</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">ECU扩展编号</td>
                <td><input type="text" class="form-control" /></td>
              </tr>


            </tbody>
          </table>

          <div class="tl-r"><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal">创建</button></div>


        </div>

      </div>

    </div>

  </div>

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">提示</h4>
      </div>
      <div class="modal-body">

        <div class="n-check-area" style="margin-top:20px;">
          <p class="suc-tip">创建成功</p>
          <div class="tl-c"><button type="button" class="btn btn-default" data-dismiss="modal">继续创建</button></div>
        </div>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
