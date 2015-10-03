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
          <div class="alert alert-success" role="alert" id="loading_tip">
  		  <strong></strong> 数据正在加载...
  	  </div>
          <div class="n-check-item">
            <span class="name">项目</span>
            <select id="station_project"><option>--查询条件--</option></select>
          </div>
          <!--<div class="n-check-item">
            年份与月份
            <input type="text" class="form-control form_datetime" readonly="" value="2015-04" required="" style="width:80px;">
          </div>-->
          <div class="n-check-item">
            <span class="name">省</span>
            <select id="province"><option value="0">--查询条件--</option></select>
          </div>
          <div class="n-check-item">
            <span class="name">城市</span>
            <select id="city"><option value="0">--查询条件--</option></select>
          </div>
          <div class="n-check-item">
            <span class="name">县区</span>
            <select id="district"><option value="0">--查询条件--</option></select>
          </div>
          <!--<div class="n-check-item">
            <span class="name">数据来源</span>
            <select id="source">
              <option value="1">杉实</option>
              <option value="2">联通</option>
            </select>
          </div>-->
          <button type="button" class="btn btn-default"  id="query_button">确定</button>
          
        </div>
        <div style="height:100%; overflow:auto; padding-right:20px;" id="show_table">
          <table class="table table-bordered">
            <tr>
              <th colspan="10">电表核准系数e</th>
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
            <tbody id="container">

           </tbody>
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
$('#loading_tip').hide();
$get('/project/list',{
	},function(d){
	   var data = d.data;
	   var html = '<option value="0">--查询条件--</option>';
	   for(var i=0;i<data.length;i++){
	      html += '<option value="'+data[i].id+'">'+data[i].projectName+'</option>';
	   }
	   $('#station_project').html(html);
});
var selProvince = $('#province');
var selCity = $('#city');
var selDistirct = $('#district');


$get('/address/province',{},function(d){
	var data = d.data;
	var html = '<option value="0">--查询条件--</option>';
	for (var i=0;i<data.length;i++){
		html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
	}
	selProvince.html(html);
});
selProvince.change(function(){
	$get('/address/city',{
		province:$(this).val()
	},function(d){
		var data = d.data;
		var html = '<option value="0">--查询条件--</option>';
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
		var html = '<option value="0">--查询条件--</option>';
		for (var i=0;i<data.length;i++){
			html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
		}
		selDistirct.html(html);
	});
});
var start = 0;
var pageSize = 20;
//查询暂时没有分页
var pageQuery = 200;
var renderOnePage = function(data){
		var html = '';
		for (var i=0;i<data.length;i++){
			var _d = data[i];
			html += '<tr id="station_item_'+_d.stationId+'">\
					  <td class="sorting_1">'+_d.station_name+'</td>\
					  <td>'+_d.t1+'</td>\
					  <td>'+_d.t2+'</td>\
					  <td>'+_d.h1+'</td>\
					  <td>'+_d.h2+'</td>\
					<td>'+_d.k1+'</td>\<td>'+_d.k2+'</td>\<td>'+_d.x+'</td>\<td>'+_d.e+'</td>\</tr>';
		}
		$('#container').html(html);
		$('#loading_tip').hide();
}
$('#query_button').click(function(){
	var project = $('#station_project').val();
	var province = $('#province').val();
	var city = $('#city').val();
	var district = $('#district').val();
        $('#loading_tip').show();

	$get('/report/evalue',{
		start:0,
		end:pageQuery,
		project:project,
		province:province,
		city:city,
		district:district,
	},function(d){
		if(d.data){
			renderOnePage(d.data);
			
		}
		if(d.data == null){
		   alert('没有检索到数据！');
		}
	});
});
</script>
</html>
