<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">
      <div class="n-nav-left">
        <ul>
          <li class="current"><a href="javascript:void(0);"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">基站列表</span></a></li>
        </ul>
      </div>
      <div class="n-right-content">
      <h4 class="tab-to-title"><a href="/base/create" class="btn btn-primary">创建基站</a></h4>
          <div class="n-check-item">
            <span class="name">项目</span>
            <select id="station_project"><option>--查询条件--</option></select>
          </div>
          <br/>
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
          <br/>
          <div class="n-check-item">
            <span class="name">站型</span>
            <select id="station_type"><option value="0">--查询条件--</option>
            <option value="1">基准站</option>
                  <option value="2">节能站</option>
                  <option value="3">预备站</option>
            </select>
          </div>
          <div class="n-check-item">
            <span class="name">负载</span>
            <select id="overload">
              <option value="0">--查询条件--</option>
              <option value="1">10-20A</option>
              <option value="2">20-30A</option>
              <option value="3">30-40A</option>
              <option value="4">40-50A</option>
              <option value="5">50-60A</option>
              <option value="6">70A+</option>
             </select>
          </div>
          <br/>
          <button type="button" class="btn btn-default" id="query_button">确定</button>
		  <table class="table table-bordered table-striped" role="grid">
          <thead>
            <tr>
              <th>站点编号</th>
              <th>站点名称</th>
              <th>城市</th>
              <th>区域</th>
              <th>负载功率</th>
              <th>砖墙/板房</th>
              <th>基准站</th>
            </tr>
          </thead>
          <tbody id="container">

          </tbody>
        </table>
        </div>
		
      </div>
      <div class="n-right-content">
        <!--<h4 class="tab-to-title">基站列表<a href="/base/create"  style="margin-left:20px;" class="btn btn-primary">创建基站</a></h4>
        -->
		
        <div class="tl-r" style="display:none">
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
  <script>
var selProvince = $('#province');
var selCity = $('#city');
var selDistirct = $('#distirct');
$get('/address/province',{},function(d){
	var data = d.data;
	var html = '<option value="0">--查询条件--</option>';
	for (var i=0;i<data.length;i++){
		html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
	}
	selProvince.html(html);
});

$get('/project/list',{
	},function(d){
	   var data = d.data;
	   var html = '<option value="0">--查询条件--</option>';
	   for(var i=0;i<data.length;i++){
	      html += '<option value="'+data[i].id+'">'+data[i].projectName+'</option>';
	   }
	   $('#station_project').html(html);
});
var start = 3;
var pageSize = 15;
var renderOnePage = function(data){
		var html = '';
		for (var i=0;i<data.length;i++){
			var _d = data[i];
			html += '<tr>\
					  <td class="sorting_1"><a href="/base/status/'+_d.stationId+'">'+_d.stationSeriseCode+'</a></td>\
					  <td>'+_d.stationName+'</td>\
					  <td>'+_d.cityName+'</td>\
					  <td>'+_d.distirctName+'</td>\
					  <td>'+_d.energyTypeName+'</td>\
					  <td>'+_d.buildTypeName+'</td>\
					  <td>是</td>\
					</tr>';
		}
		$('#container').html(html);
}
$get('/station/list',{
		start:start,
		end:start + pageSize
	},function(d){
		var data = d.data;
		renderOnePage(data);
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

$('#query_button').click(function(){
	var project = $('#station_project').val();
	var province = $('#province').val();
	var city = $('#city').val();
	var district = $('#district').val();
	var project = $('#station_project').val();
	var station_type = $('#station_type').val();
	var overload = $('#overload').val();

	$get('/station/query',{
		start:start,
		end:start + pageSize,
		project:project,
		province:province,
		city:city,
		district:district,
		station_type:station_type,
		overload:overload
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
</body>
</html>
