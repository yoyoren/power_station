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
                <td><input type="text" class="form-control" id="station_name"/></td>
                <td class="td-to-th">站点类型</td>
                <td>
                  <select id="station_type">
                    <option value="1">基准站</option>
                    <option value="2">节能站</option>
                    <option value="3">预备站</option>
                  </select>
                </td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">基站编号</td>
                <td><input type="text" class="form-control" id="station_serise_code"/></td>
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
                  <select id="station_project">
                    <option value="0">选择项目</option>
                  </select>
                </td>
                <td class="td-to-th">工程分期</td>
                <td><input type="text" class="form-control" /></td>
                <td class="td-to-th">建站时间</td>
                <td><input id="station_createtime" size="16" type="text" value="2012-06-15" readonly class="form-control form_datetime"></td>
              </tr>

              <tr>
                <td class="td-to-th">省</td>
                <td><select id="province"><option value="0">请选择</option></select></td>
                <td class="td-to-th">城市</td>
                <td><select id="city"><option value="0">请选择</option></select></td>
                <td class="td-to-th">区县</td>
                <td><select id="distirct"><option value="0">请选择</option></select></td>
              </tr>

              <tr>
                <td class="td-to-th">地址</td>
                <td><input id="address" type="text" class="form-control" /></td>
                <td class="td-to-th">经度</td>
                <td><input id="lat" type="text" class="form-control" /></td>
                <td class="td-to-th">纬度</td>
                <td><input id="lng" type="text" class="form-control" /></td>
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
                  <select id="power_supply_type">
                    <option value="1">市政供电</option>
                    <option value="2">物业供电</option>
                  </select>
                </td>
                <td class="td-to-th">电价收费方</td>
                <td>
                  <select id="fee_type">
                    <option value="1">供电局收费</option>
                    <option value="2">物业收费</option>
                    <option value="3">托收</option>
                  </select>

                </td>
                <td class="td-to-th">建筑类型</td>
                <td>
                  <select id="building_type">
                    <option value="1">板房</option>
                    <option value="2">砖墙</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td class="td-to-th">电价</td>
                <td><input id="price" type="text" class="form-control" /></td>
                <td class="td-to-th">分成比例</td>
                <td><input id="ration" ype="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">局方电表号</td>
                <td><input id="ammeter_num_chinamobile" type="text" class="form-control" /></td>
                <td class="td-to-th">我方电表号</td>
                <td><input id="ammeter_num" type="text" class="form-control" /></td>
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
                <td><input id="air_condition_num" type="text" class="form-control" /></td>
                <td class="td-to-th">空调温感</td>
                <td><input id="air_condition_tempature" type="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">室外温感</td>
                <td><input id="tempature_out_side" type="text" class="form-control" id="temp_outside"/></td>
                <td class="td-to-th">室内温感</td>
                <td><input id="tempature_in_side" type="text" class="form-control" id="temp_inside"/></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">进风机型号</td>
                <td><input id="fan_in_type" type="text" class="form-control" /></td>
                <td class="td-to-th">出风机型号</td>
                <td><input id="fan_out_type" type="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">恒温柜数量</td>
                <td><input id="cabinet_num" type="text" class="form-control" /></td>
                <td class="td-to-th">蓄电池柜</td>
                <td><input id="battery_type" type="text" class="form-control" /></td>
                <td class="td-to-th">蓄电池空调</td>
                <td><input id="battery_air_type" type="text" class="form-control" /></td>
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
                <td><input id="overload" type="text" class="form-control" /></td>
                <td class="td-to-th">能耗类型（A）</td>
                <td><input id="energy_type" type="text" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">SIM卡号</td>
                <td><input id="sim_num" type="text" class="form-control" /></td>
                <td class="td-to-th">ECU编号</td>
                <td><input id="ecu_num" type="text" class="form-control" /></td>
                <td class="td-to-th">ECU扩展编号</td>
                <td><input id="esg_num" type="text" class="form-control" /></td>
              </tr>


            </tbody>
          </table>
          <div class="tl-r">
		  <button type="button" class="btn btn-primary" id="create_button">创建</button></div>
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
<script type="text/javascript" src="/static/src/js/datepicker/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
var selProvince = $('#province');
var selCity = $('#city');
var selDistirct = $('#distirct');
$get('/address/province',{},function(d){
	var data = d.data;
	var html = '<option value="0">请选择</option>';
	for (var i=0;i<data.length;i++){
		html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
	}
	selProvince.html(html);
});

$get('/project/list',{
	},function(d){
	   var data = d.data;
	   var html = '';
	   for(var i=0;i<data.length;i++){
	      html += '<option value="'+data[i].id+'">'+data[i].projectName+'</option>';
	   }
	   $('#station_project').html(html);
});

selProvince.change(function(){
	$get('/address/city',{
		province:$(this).val()
	},function(d){
		var data = d.data;
		var html = '<option value="0">请选择</option>';
		for (var i=0;i<data.length;i++){
			html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
		}
		selCity.html(html);
	});
});

selCity.change(function(){
	$get('/address/district',{
		province:selProvince.val(),
		city:$(this).val()
	},function(d){
		var data = d.data;
		var html = '<option value="0">请选择</option>';
		for (var i=0;i<data.length;i++){
			html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
		}
		selDistirct.html(html);
	});
});

$(".form_datetime").datetimepicker({
      format: 'yyyy-mm-dd hh:ii',
      language: 'cn',
	  autoclose:true
});
	
$('#create_button').click(function(){

	//基站基本信息
	var name = $('#station_name').val();
	var code = $('#station_serise_code').val();
	var type = $('#station_type').val();
	var project = $('#station_project').val();
	var province = $('#province').val();
	var city = $('#city').val();
	var distirct = $('#distirct').val();
	var address = $('#address').val();
	var lat = $('#lat').val();
	var lng = $('#lng').val();
	var create_time = $('#station_createtime').val();
	create_time = new Date(create_time).getTime() / 1000;
	
	//设备信息
	var air_condition_num = $('#air_condition_num').val();
	var tempature_out_side = $('#tempature_out_side').val();
	var tempature_in_side = $('#tempature_in_side').val();
	var fan_out_type = $('#fan_out_type').val();
	var fan_in_type = $('#fan_in_type').val();
	var cabinet_num = $('#cabinet_num').val();
	var battery_type = $('#battery_type').val();
	var air_condition_tempature = $('#air_condition_tempature').val();
	
	//节能信息
	var price = $('#price').val();
	var ammeter_num = $('#ammeter_num').val();
	var ammeter_num_chinamobile = $('#ammeter_num_chinamobile').val();
	var fee_type = $('#fee_type').val();
	var power_supply_type = $('#power_supply_type').val();
	var overload = $('#overload').val();
	var sim_num = $('#sim_num').val();
	var esg_num = $('#esg_num').val();
	var ecu_num = $('#ecu_num').val();
	var building_type = $('#building_type').val();
	var ration = $('#ration').val();
	var energy_type = $('#energy_type').val();
	
	$post('/station/add',{
	  name:name,
	  code:code,
	  type:type,
	  project:project,
	  project_id:project,
	  province:province,
	  city:city,
	  distirct:distirct,
	  address:address,
	  lat:lat,
	  lng:lng,
	  create_time:create_time,
	  air_condition_num:air_condition_num,
	  tempature_out_side:tempature_out_side,
	  tempature_in_side:tempature_in_side,
	  fan_out_type:fan_out_type,
	  fan_in_type:fan_in_type,
	  cabinet_num:cabinet_num,
	  battery_type:battery_type,
	  air_condition_tempature:air_condition_tempature,
	  price:price,
	  ammeter_num:ammeter_num,
	  ammeter_num_chinamobile:ammeter_num_chinamobile,
	  fee_type:fee_type,
	  power_supply_type:power_supply_type,
	  overload:overload,
	  sim_num:sim_num,
	  esg_num:esg_num,
	  ecu_num:ecu_num,
	  building_type:building_type,
	  ration:ration,
	  energy_type:energy_type
	},function(d){
		if(d.code == 0){
			alert('创建成功');
			location.href = '/base';
		}
	});

});
</script>
</html>
